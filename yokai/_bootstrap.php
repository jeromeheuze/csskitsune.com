<?php
require_once __DIR__ . '/../includes/seo-config.php';
require_once __DIR__ . '/yokai-data.php';

function yokai_render(string $slug): void
{
    $all = yokai_all_configs();
    if (!isset($all[$slug])) {
        http_response_code(404);
        header('Location: /404.php');
        exit;
    }
    $yokai = $all[$slug];
    $meta = [
        'title' => "{$yokai['name_en']} CSS Theme — {$yokai['name_jp']} Web Design Palette | CSSKitsune",
        'description' => "Free {$yokai['name_en']} CSS theme inspired by the Japanese {$yokai['name_en']} spirit. Color tokens, CSS variables, and typography for {$yokai['name_en']}-themed websites.",
        'canonical' => SITE_URL . $yokai['page_url'],
    ];
    require __DIR__ . '/_template.php';
}
