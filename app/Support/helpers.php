<?php

function to_json($response, $code = 200)
{
    return response()
        ->json($response, $code);
}

function nestable($nodes, $options = [])
{
    $route = $options['route'] ?? 'menus';

    $recursive = function ($items) use (&$recursive, $options, $route) {
        if (!$items->count()) return;

        $html = '<ol class="dd-list">';
        foreach ($items as $item) {
            $html .= '<li class="dd-item dd3-item" data-id="' . $item->id . '">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">' . $item->{$options['key'] ?? 'title'} . '</div>
            <div class="actions">
            <a data-ajax class="btn btn-sm btn-default" href="' . route('admin.' . $route . '.edit', $item->id) . '">' . trans('admin.actions.edit') . '</a>
            <a data-delete class="btn btn-sm btn-danger" href="' . route('admin.' . $route . '.destroy', $item->id) . '"><i class="fa fa-trash"></i></a>
            </div>';
            if ($item->children) {
                $html .= $recursive($item->children);
            }
            $html .= '</li>';
        }
        $html .= '</ol>';

        return $html;
    };

    $html = '<div class="dd" data-nestable data-update-url="' . route('admin.' . $route . '.reorder') . '">';
    $html .= $recursive($nodes);
    $html .= '</div>';

    return $html;
}

function locale_to_code($code)
{
    $countryList = array(
        'pt-BR' => 'br',
        'en' => 'us',
        'es' => 'es',
    );

    if (!isset($countryList[$code])) {
        return $code;
    } else {
        return $countryList[$code];
    }
}

function error($message, $url = null, $ajax = false)
{
    if ($message instanceof \Exception) {
        $message = $message->getMessage();
    }

    \Flash::error($message);

    if ($url) {
        if ($ajax && request()->ajax()) {
            return to_json([
                'success' => true,
                'url' => $url
            ]);
        }

        return redirect($url)->withInput();
    }
}

function success($message, $url = null, $ajax = false)
{
    \Flash::success($message);

    if ($url) {
        if ($ajax && request()->ajax()) {
            return to_json([
                'success' => true,
                'url' => $url
            ]);
        }

        return redirect($url);
    }
}

function to_float($money)
{
    if (!$money) return null;

    $cleanString = preg_replace('/([^0-9\.,])/i', '', $money);
    $onlyNumbersString = preg_replace('/([^0-9])/i', '', $money);

    $separatorsCountToBeErased = strlen($cleanString) - strlen($onlyNumbersString) - 1;

    $stringWithCommaOrDot = preg_replace('/([,\.])/', '', $cleanString, $separatorsCountToBeErased);
    $removedThousandSeparator = preg_replace('/(\.|,)(?=[0-9]{3,}$)/', '',  $stringWithCommaOrDot);

    return (float) str_replace(',', '.', $removedThousandSeparator);
}


function whatsapp($number, $text = null)
{
    $web = 'web';
    $agent = new \Jenssegers\Agent\Agent();
    if ($agent->isMobile()) {
        $web = 'api';
    }

    $number = str_replace(['(', ')', ' ', '-'], '', $number);
    return 'https://' . $web . '.whatsapp.com/send?phone=+55' . $number . ($text ? '&text=' . $text : '');
}

function phone($number)
{
    $number = str_replace(['(', ')', ' ', '-'], '', $number);
    return 'tel:' . $number;
}

function email($email)
{
    return 'mailto:' . $email;
}

function parse_date($complete)
{
    $date = trim($complete);
    $hour = null;
    if (strpos($date, ' ') !== false) {
        list($date, $hour) = explode(' ', $date);
    }

    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
        return $date . ($hour !== null ? ' ' . $hour : '');
    }

    $parse = DateTime::createFromFormat(trans('admin.locale.' . ($hour !== null ? 'datetime' : 'date')), $complete);
    return $parse->format('Y-m-d') . ($hour !== null ? ' ' . $hour : '');
}
