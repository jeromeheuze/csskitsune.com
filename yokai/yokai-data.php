<?php
/**
 * Yokai theme configs for CSSKitsune /yokai/ network.
 * @return array<string, array>
 */
function yokai_all_configs(): array
{
    $jmc = 'https://japanesemythicalcreatures.com/yokai';

    $defs = [
        'kitsune' => [
            'name_en' => 'Kitsune', 'name_jp' => '狐', 'slug' => 'kitsune',
            'description' => 'The fox spirit of intelligence, beauty, and transformation.',
            'card_blurb' => 'Ember orange, twilight indigo, sacred gold',
            'palette' => [
                ['name' => 'Ember', 'hex' => '#C9521A'],
                ['name' => 'Indigo', 'hex' => '#2D2B55'],
                ['name' => 'Gold', 'hex' => '#D4A827'],
                ['name' => 'Cream', 'hex' => '#F5ECD7'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#C9521A', '--yokai-accent' => '#D4A827',
                '--yokai-background' => '#0F0D1A', '--yokai-text' => '#F5ECD7',
            ],
            'jmc_anchor' => 'Kitsune — Japanese Fox Spirit Mythology',
            'related' => ['inari', 'bakeneko', 'yatagarasu', 'tanuki'],
            'page_url' => '/kitsune/',
        ],
        'tengu' => [
            'name_en' => 'Tengu', 'name_jp' => '天狗', 'slug' => 'tengu',
            'description' => 'Mountain goblins of wind, pride, and martial discipline.',
            'card_blurb' => 'Crimson red, mountain grey, deep cedar',
            'palette' => [
                ['name' => 'Crimson', 'hex' => '#B91C1C'],
                ['name' => 'Stone', 'hex' => '#4B5563'],
                ['name' => 'Cedar', 'hex' => '#3D4A2C'],
                ['name' => 'Mist', 'hex' => '#E5E0D4'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#B91C1C', '--yokai-accent' => '#3D4A2C',
                '--yokai-background' => '#1C1917', '--yokai-text' => '#E5E0D4',
            ],
            'jmc_anchor' => 'Tengu — Japanese Mountain Spirit Lore',
            'related' => ['raijin', 'fujin', 'oni', 'kitsune'],
        ],
        'oni' => [
            'name_en' => 'Oni', 'name_jp' => '鬼', 'slug' => 'oni',
            'description' => 'Demonic ogres of immense strength, horns, and iron will.',
            'card_blurb' => 'Cobalt blue skin, black iron, bone white',
            'palette' => [
                ['name' => 'Cobalt', 'hex' => '#1E40AF'],
                ['name' => 'Iron', 'hex' => '#111111'],
                ['name' => 'Bone', 'hex' => '#F5F0E8'],
                ['name' => 'Crimson', 'hex' => '#C41E3A'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#1E40AF', '--yokai-accent' => '#C41E3A',
                '--yokai-background' => '#111111', '--yokai-text' => '#F5F0E8',
            ],
            'jmc_anchor' => 'Oni — Japanese Demon & Ogre Mythology',
            'related' => ['tengu', 'gashadokuro', 'raijin', 'yamata-no-orochi'],
        ],
        'tanuki' => [
            'name_en' => 'Tanuki', 'name_jp' => '狸', 'slug' => 'tanuki',
            'description' => 'Shape-shifting raccoon dogs of mischief, warmth, and sake halls.',
            'card_blurb' => 'Warm brown, sake gold, cedar green',
            'palette' => [
                ['name' => 'Brown', 'hex' => '#8B5E3C'],
                ['name' => 'Sake Gold', 'hex' => '#C9A227'],
                ['name' => 'Cedar', 'hex' => '#2D5016'],
                ['name' => 'Cream', 'hex' => '#F5ECD7'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#8B5E3C', '--yokai-accent' => '#C9A227',
                '--yokai-background' => '#1A1510', '--yokai-text' => '#F5ECD7',
            ],
            'jmc_anchor' => 'Tanuki — Japanese Raccoon Dog Yokai Lore',
            'related' => ['kitsune', 'bakeneko', 'kappa', 'inari'],
        ],
        'yuki-onna' => [
            'name_en' => 'Yuki-onna', 'name_jp' => '雪女', 'slug' => 'yuki-onna',
            'description' => 'The snow woman — pale beauty, winter silence, and fatal cold.',
            'card_blurb' => 'Ice white, frozen blue, pale lilac',
            'palette' => [
                ['name' => 'Ice', 'hex' => '#F0F8FF'],
                ['name' => 'Frost', 'hex' => '#7EB8DA'],
                ['name' => 'Lilac', 'hex' => '#D8C8E8'],
                ['name' => 'Night', 'hex' => '#1A2A3A'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#7EB8DA', '--yokai-accent' => '#D8C8E8',
                '--yokai-background' => '#1A2A3A', '--yokai-text' => '#F0F8FF',
            ],
            'jmc_anchor' => 'Yuki-onna — Japanese Snow Woman Spirit',
            'related' => ['fujin', 'ningyo', 'baku', 'kitsune'],
        ],
        'kappa' => [
            'name_en' => 'Kappa', 'name_jp' => '河童', 'slug' => 'kappa',
            'description' => 'River imps with bowls of water, cucumber offerings, and muddy wit.',
            'card_blurb' => 'River teal, lily green, muddy amber',
            'palette' => [
                ['name' => 'Teal', 'hex' => '#1A7A6D'],
                ['name' => 'Lily', 'hex' => '#6B9B4A'],
                ['name' => 'Mud', 'hex' => '#8B6914'],
                ['name' => 'Foam', 'hex' => '#E8F5E9'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#1A7A6D', '--yokai-accent' => '#6B9B4A',
                '--yokai-background' => '#0F1F1A', '--yokai-text' => '#E8F5E9',
            ],
            'jmc_anchor' => 'Kappa — Japanese River Yokai Mythology',
            'related' => ['ningyo', 'tanuki', 'shisa', 'tsuchigumo'],
        ],
        'baku' => [
            'name_en' => 'Baku', 'name_jp' => '獏', 'slug' => 'baku',
            'description' => 'Dream-eaters who devour nightmares and guard restless sleep.',
            'card_blurb' => 'Dream purple, cloud grey, pearl',
            'palette' => [
                ['name' => 'Dream', 'hex' => '#6B4C9A'],
                ['name' => 'Cloud', 'hex' => '#B8B0A8'],
                ['name' => 'Pearl', 'hex' => '#F5F0EB'],
                ['name' => 'Dusk', 'hex' => '#2A2438'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#6B4C9A', '--yokai-accent' => '#B8B0A8',
                '--yokai-background' => '#2A2438', '--yokai-text' => '#F5F0EB',
            ],
            'jmc_anchor' => 'Baku — Japanese Dream-Eater Yokai',
            'related' => ['yuki-onna', 'nue', 'jorogumo', 'bakeneko'],
        ],
        'ryu' => [
            'name_en' => 'Ryu (Dragon)', 'name_jp' => '龍', 'slug' => 'ryu',
            'description' => 'Celestial dragons of rain, imperial power, and storm wisdom.',
            'card_blurb' => 'Imperial green, storm silver, gold',
            'palette' => [
                ['name' => 'Jade', 'hex' => '#1B5E3A'],
                ['name' => 'Silver', 'hex' => '#A8B8C8'],
                ['name' => 'Gold', 'hex' => '#D4A827'],
                ['name' => 'Storm', 'hex' => '#1E2A3A'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#1B5E3A', '--yokai-accent' => '#D4A827',
                '--yokai-background' => '#1E2A3A', '--yokai-text' => '#E8F0F8',
            ],
            'jmc_anchor' => 'Ryu — Japanese Dragon Mythology',
            'related' => ['yamata-no-orochi', 'raijin', 'inari', 'shisa'],
        ],
        'jorogumo' => [
            'name_en' => 'Jorōgumo', 'name_jp' => '絡新婦', 'slug' => 'jorogumo',
            'description' => 'Spider women who weave silk, shadow, and seductive danger.',
            'card_blurb' => 'Deep crimson, silk white, shadow black',
            'palette' => [
                ['name' => 'Crimson', 'hex' => '#8B0000'],
                ['name' => 'Silk', 'hex' => '#FFFEF9'],
                ['name' => 'Shadow', 'hex' => '#1A1A1A'],
                ['name' => 'Web', 'hex' => '#C4B8C8'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#8B0000', '--yokai-accent' => '#C4B8C8',
                '--yokai-background' => '#1A1A1A', '--yokai-text' => '#FFFEF9',
            ],
            'jmc_anchor' => 'Jorōgumo — Japanese Spider Yokai Lore',
            'related' => ['tsuchigumo', 'bakeneko', 'baku', 'nue'],
        ],
        'bakeneko' => [
            'name_en' => 'Bakeneko', 'name_jp' => '化け猫', 'slug' => 'bakeneko',
            'description' => 'Supernatural cats — amber eyes, night prowling, household hauntings.',
            'card_blurb' => 'Slate grey, amber, night navy',
            'palette' => [
                ['name' => 'Slate', 'hex' => '#5C5F66'],
                ['name' => 'Amber', 'hex' => '#D4A027'],
                ['name' => 'Navy', 'hex' => '#1A1A2E'],
                ['name' => 'Moon', 'hex' => '#E8E4F0'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#5C5F66', '--yokai-accent' => '#D4A027',
                '--yokai-background' => '#1A1A2E', '--yokai-text' => '#E8E4F0',
            ],
            'jmc_anchor' => 'Bakeneko — Japanese Supernatural Cat Yokai',
            'related' => ['kitsune', 'tanuki', 'jorogumo', 'inari'],
        ],
        'raijin' => [
            'name_en' => 'Raijin', 'name_jp' => '雷神', 'slug' => 'raijin',
            'description' => 'Thunder god of drums, lightning rings, and storm fury.',
            'card_blurb' => 'Electric yellow, storm grey, thunder black',
            'palette' => [
                ['name' => 'Lightning', 'hex' => '#FFD700'],
                ['name' => 'Storm', 'hex' => '#6B7280'],
                ['name' => 'Thunder', 'hex' => '#0F0F0F'],
                ['name' => 'Cloud', 'hex' => '#E5E7EB'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#FFD700', '--yokai-accent' => '#6B7280',
                '--yokai-background' => '#0F0F0F', '--yokai-text' => '#E5E7EB',
            ],
            'jmc_anchor' => 'Raijin — Japanese Thunder God Mythology',
            'related' => ['fujin', 'tengu', 'oni', 'ryu'],
        ],
        'fujin' => [
            'name_en' => 'Fujin', 'name_jp' => '風神', 'slug' => 'fujin',
            'description' => 'Wind god carrying storms in his bag across sky and sea.',
            'card_blurb' => 'Sky turquoise, cloud white, wind grey',
            'palette' => [
                ['name' => 'Turquoise', 'hex' => '#2DD4BF'],
                ['name' => 'Cloud', 'hex' => '#F0F4F8'],
                ['name' => 'Wind', 'hex' => '#9CA3AF'],
                ['name' => 'Deep Sky', 'hex' => '#1E3A5F'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#2DD4BF', '--yokai-accent' => '#9CA3AF',
                '--yokai-background' => '#1E3A5F', '--yokai-text' => '#F0F4F8',
            ],
            'jmc_anchor' => 'Fujin — Japanese Wind God Lore',
            'related' => ['raijin', 'yuki-onna', 'tengu', 'nue'],
        ],
        'nue' => [
            'name_en' => 'Nue', 'name_jp' => '鵺', 'slug' => 'nue',
            'description' => 'Chimera beasts — monkey head, tanuki body, tiger limbs, serpent tail.',
            'card_blurb' => 'Chimera tones, moonlit grey, rust',
            'palette' => [
                ['name' => 'Rust', 'hex' => '#7A5C4A'],
                ['name' => 'Moon', 'hex' => '#C4B8C8'],
                ['name' => 'Shadow', 'hex' => '#4A3728'],
                ['name' => 'Mist', 'hex' => '#E8E4E0'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#7A5C4A', '--yokai-accent' => '#C4B8C8',
                '--yokai-background' => '#2A2420', '--yokai-text' => '#E8E4E0',
            ],
            'jmc_anchor' => 'Nue — Japanese Chimera Yokai Mythology',
            'related' => ['yamata-no-orochi', 'baku', 'tengu', 'oni'],
        ],
        'gashadokuro' => [
            'name_en' => 'Gashadokuro', 'name_jp' => 'がしゃどくろ', 'slug' => 'gashadokuro',
            'description' => 'Giant skeletons formed from war dead, rattling in the night.',
            'card_blurb' => 'Bone white, void black, blood rust',
            'palette' => [
                ['name' => 'Bone', 'hex' => '#F5F0E8'],
                ['name' => 'Void', 'hex' => '#0A0A0A'],
                ['name' => 'Rust', 'hex' => '#8B2500'],
                ['name' => 'Ash', 'hex' => '#6B6B6B'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#8B2500', '--yokai-accent' => '#F5F0E8',
                '--yokai-background' => '#0A0A0A', '--yokai-text' => '#E8E0D8',
            ],
            'jmc_anchor' => 'Gashadokuro — Japanese Giant Skeleton Yokai',
            'related' => ['oni', 'yamata-no-orochi', 'yatagarasu', 'jorogumo'],
        ],
        'shisa' => [
            'name_en' => 'Shisa', 'name_jp' => 'シーサー', 'slug' => 'shisa',
            'description' => 'Okinawan guardian lions — terracotta, coral shores, warding flame.',
            'card_blurb' => 'Terracotta, sea foam, coral',
            'palette' => [
                ['name' => 'Terracotta', 'hex' => '#C67B4E'],
                ['name' => 'Seafoam', 'hex' => '#A8E6CF'],
                ['name' => 'Coral', 'hex' => '#F08080'],
                ['name' => 'Deep Sea', 'hex' => '#1A3A4A'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#C67B4E', '--yokai-accent' => '#A8E6CF',
                '--yokai-background' => '#1A3A4A', '--yokai-text' => '#F5F8F6',
            ],
            'jmc_anchor' => 'Shisa — Okinawan Guardian Lion Folklore',
            'related' => ['kappa', 'ningyo', 'inari', 'ryu'],
        ],
        'yamata-no-orochi' => [
            'name_en' => 'Yamata no Orochi', 'name_jp' => '八岐大蛇', 'slug' => 'yamata-no-orochi',
            'description' => 'Eight-headed serpent of floods, sake, and heroic slaying.',
            'card_blurb' => 'Serpent green, storm purple, crimson',
            'palette' => [
                ['name' => 'Serpent', 'hex' => '#2D5A27'],
                ['name' => 'Storm', 'hex' => '#5B3A7A'],
                ['name' => 'Crimson', 'hex' => '#8B0000'],
                ['name' => 'Flood', 'hex' => '#1A2C3A'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#2D5A27', '--yokai-accent' => '#8B0000',
                '--yokai-background' => '#1A2C3A', '--yokai-text' => '#E8F0E8',
            ],
            'jmc_anchor' => 'Yamata no Orochi — Eight-Headed Serpent Myth',
            'related' => ['ryu', 'oni', 'gashadokuro', 'inari'],
        ],
        'yatagarasu' => [
            'name_en' => 'Yatagarasu', 'name_jp' => '八咫烏', 'slug' => 'yatagarasu',
            'description' => 'Three-legged sun crow guiding emperors through divine paths.',
            'card_blurb' => 'Raven black, solar gold, blood red',
            'palette' => [
                ['name' => 'Raven', 'hex' => '#0F0F0F'],
                ['name' => 'Solar', 'hex' => '#D4AF37'],
                ['name' => 'Blood', 'hex' => '#8B0000'],
                ['name' => 'Dawn', 'hex' => '#F5ECD7'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#D4AF37', '--yokai-accent' => '#8B0000',
                '--yokai-background' => '#0F0F0F', '--yokai-text' => '#F5ECD7',
            ],
            'jmc_anchor' => 'Yatagarasu — Three-Legged Crow of Japanese Myth',
            'related' => ['inari', 'kitsune', 'raijin', 'tengu'],
        ],
        'tsuchigumo' => [
            'name_en' => 'Tsuchigumo', 'name_jp' => '土蜘蛛', 'slug' => 'tsuchigumo',
            'description' => 'Earth spiders — cave dwellers, web silver, buried grudges.',
            'card_blurb' => 'Earth brown, web silver, cave black',
            'palette' => [
                ['name' => 'Earth', 'hex' => '#6B5344'],
                ['name' => 'Web', 'hex' => '#C0C0C0'],
                ['name' => 'Cave', 'hex' => '#1A1510'],
                ['name' => 'Clay', 'hex' => '#D4C4B0'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#6B5344', '--yokai-accent' => '#C0C0C0',
                '--yokai-background' => '#1A1510', '--yokai-text' => '#D4C4B0',
            ],
            'jmc_anchor' => 'Tsuchigumo — Japanese Earth Spider Yokai',
            'related' => ['jorogumo', 'oni', 'gashadokuro', 'kappa'],
        ],
        'ningyo' => [
            'name_en' => 'Ningyo', 'name_jp' => '人魚', 'slug' => 'ningyo',
            'description' => 'Merfolk of longevity, pearl tears, and deep-sea longing.',
            'card_blurb' => 'Deep sea teal, pearl pink, seafoam',
            'palette' => [
                ['name' => 'Deep Sea', 'hex' => '#0E4D64'],
                ['name' => 'Pearl', 'hex' => '#F4C4C4'],
                ['name' => 'Seafoam', 'hex' => '#98D8C8'],
                ['name' => 'Abyss', 'hex' => '#061820'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#0E4D64', '--yokai-accent' => '#F4C4C4',
                '--yokai-background' => '#061820', '--yokai-text' => '#98D8C8',
            ],
            'jmc_anchor' => 'Ningyo — Japanese Merfolk & Mermaid Lore',
            'related' => ['kappa', 'yuki-onna', 'shisa', 'baku'],
        ],
        'inari' => [
            'name_en' => 'Inari', 'name_jp' => '稲荷', 'slug' => 'inari',
            'description' => 'Kami of rice, fox messengers, torii tunnels, and harvest gold.',
            'card_blurb' => 'Sacred red, harvest gold, shrine white',
            'palette' => [
                ['name' => 'Sacred Red', 'hex' => '#C41E3A'],
                ['name' => 'Harvest', 'hex' => '#D4A827'],
                ['name' => 'Shrine', 'hex' => '#FFFEF9'],
                ['name' => 'Forest', 'hex' => '#1A2C1E'],
            ],
            'css_vars' => [
                '--yokai-primary' => '#C41E3A', '--yokai-accent' => '#D4A827',
                '--yokai-background' => '#1A2C1E', '--yokai-text' => '#FFFEF9',
            ],
            'jmc_anchor' => 'Inari — Japanese Fox Deity & Rice Kami Lore',
            'related' => ['kitsune', 'tanuki', 'yatagarasu', 'shisa'],
        ],
    ];

    foreach ($defs as $slug => &$y) {
        $y['jmc_url'] = $y['jmc_url'] ?? "{$jmc}/{$slug}/";
        $y['font_display'] = 'Noto Serif JP';
        $y['font_body'] = 'DM Sans';
        $y['hub_colors'] = array_slice(array_column($y['palette'], 'hex'), 0, 3);
        if (!isset($y['page_url'])) {
            $y['page_url'] = "/yokai/{$slug}.php";
        }
    }
    unset($y);

    return $defs;
}

function yokai_css_block(array $css_vars): string
{
    $lines = array_map(
        fn ($k, $v) => "  {$k}: {$v};",
        array_keys($css_vars),
        array_values($css_vars)
    );
    return ":root {\n" . implode("\n", $lines) . "\n}";
}
