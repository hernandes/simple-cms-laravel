<?php
namespace App\Support;

use Illuminate\Validation\ValidationException;
use DB;

trait Filterable
{

    public function getDefaultSortColumn()
    {
        if (isset($this->order)) {
            return $this->order['column'] ?? 'created_at';
        }
        return 'created_at';
    }

    public function getDefaultSortDirection()
    {
        if (isset($this->order)) {
            return $this->order['direction'] ?? 'asc';
        }
        return 'asc';
    }

    public function scopeTypeahead($query, $columns)
    {
        return $query->when($columns, function($query) use ($columns) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . request('q') . '%');
                }
            })
            ->limit(10)
            ->get();
    }

    public function scopeSearch($query)
    {
        $this->validate(request()->all(), [
            'column' => 'required|in:' . $this->getSearchableColumns()
        ]);

        return $query->select('id',request('column'), DB::Raw(request('column'). ' as str'))
            ->orderBy(request('column'))
            ->whereNotNull(request('column'))
            ->when(request('query'), function($q) {
                $q->where(request('column'), 'like', '%'.request('query').'%');
            })
            ->limit(25)
            ->get();
    }

    public function scopeExportable($query)
    {
        return $this->exportable();
    }

    public function scopeExport($query)
    {
        $query = $this->process(request()->all(), $query);

        $column = request('sort_column', $this->getDefaultSortColumn());
        $dir = request('sort_direction', $this->getDefaultSortDirection());
        $response = $query->orderBy(
            $column,
            $dir
        )->get();

        return $response;
    }

    public function scopeServerExport($query, $params)
    {
        $query = $this->process($params, $query);

        $response = $query->orderBy(
            $params['sort_column'] ?: $this->getDefaultSortColumn(),
            $params['sort_direction'] ?: $this->getDefaultSortDirection()
        )
            ->get();

        return $response;
    }

    public function scopeFilter($query)
    {
        $query = $this->process(request()->all(), $query);

        $column = request('sort_column', $this->getDefaultSortColumn());
        $dir = request('sort_direction', $this->getDefaultSortDirection());

        $query->orderBy(
            strpos($column, '.') === false ? $this->getTable() . '.' . $column : $column,
            $dir
        );

        return $query->paginate(
            request('limit', 25)
        );
    }

    protected function process($data, $query)
    {
        $this->validate($data, [
            'sort_direction' => 'sometimes|required|in:asc,desc',

            'limit' => 'sometimes|required|integer|min:1',
            'page' => 'sometimes|required|integer|min:1',

            // advanced multi-column filter
            'filter_match' => 'sometimes|required|in:and,or',
            'f' => 'sometimes|required|array',
            'f.*.column' => 'required|in:'.$this->getWhiteListColumns(),
            'f.*.operator' => 'required_with:f.*.column|in:'.$this->getAllowedOperators(),
            'f.*.query_1' => 'required_unless:f.*.operator,is_empty,is_not_empty',
            'f.*.query_2' => 'required_if:f.*.operator,between,between_date',
        ]);

        if (isset($data['q']) && !empty($data['q'])) {
            $data['filter_match'] = 'or';
            $data['f'] = [];
            foreach ($this->searchable as $column) {
                $data['f'][] = [
                    'operator' => 'contains',
                    'query_1' => $data['q'],
                    'column' => $column
                ];
            }
        }

        return (new QueryBuilder())->apply($query, $data);
    }

    protected function validate($data, $rules)
    {
        $v = validator()->make($data, $rules);

        if ($v->fails()) {
            throw new ValidationException($v);
        }
    }

    protected function getWhiteListColumns()
    {
        if (isset($this->filterable)) {
            return implode(',', $this->filterable);
        }
        return '';
    }

    public function getSearchableColumns()
    {
        if (isset($this->serchable)) {
            return implode(',', $this->searchable);
        }
        return '';
    }

    protected function getAllowedOperators()
    {
        return implode(',', [
            'equal_to',
            'not_equal_to',
            'less_than',
            'greater_than',
            'less_than_or_equal_to',
            'greater_than_or_equal_to',
            'between',
            'not_between',
            'includes',
            'not_includes',
            'is_empty',
            'is_not_empty',
            'contains',
            'starts_with',
            'ends_with',
            'in_the_past',
            'in_the_next',
            'in_the_peroid',
            'over',
            'between_date',
            'equal_to_date'
        ]);
    }
}
