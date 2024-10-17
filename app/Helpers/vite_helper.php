<?php

$manifest = '';
$url = "";

$manifestData = null;

if (!function_exists('vite_assets')) {
    function vite_assets($url, $isDev, $lib)
    {
        $base = 'http://localhost:3000/assets';
        $html = '';
        if($isDev) {
            if ($lib === 'react') {
                $html .= <<<HTML
                <script type="module" src="{$base}/@vite/client"></script>
                HTML;
                    $html .= '<script type="module">
                    import RefreshRuntime from "'.$base.'/@react-refresh"
                    RefreshRuntime.injectIntoGlobalHook(window)
                    window.$RefreshReg$ = () => {}
                    window.$RefreshSig$ = () => (type) => type
                    window.__vite_plugin_react_preamble_installed__ = true
                </script>';    
            }
            
            $html .= <<<HTML
            <script src="{$base}/{$url}" type="module" defer></script>
            HTML;
            return $html;
        } else {
            return assetProd($url);
        }
    }
}

function assetProd($url)
{
    $manifest =  ROOTPATH . 'public/assets/.vite/manifest.json';
    $config = [
        'storePath' => WRITEPATH . 'cache/',
        'mode'      => 0640,
    ];
    $fileConfig = config('Cache');
    $filescache = new \CodeIgniter\Cache\Handlers\FileHandler($fileConfig);
    //$cache = new \CodeIgniter\Cache\($files);
    $cachemanifest = $filescache->get('vite_manifest');
    if ($cachemanifest === null) {

        $cachemanifest = json_decode(file_get_contents($manifest), true);
        $filescache->save('vite_manifest', $cachemanifest);
    }
    $manifestData = $cachemanifest;
    $file = $manifestData[$url]['file'] ?? null;
    $cssFiles = $manifestData[$url]['css'] ?? [];
    if ($file === null) {
        return '';
    }
    $html = <<<HTML
        <script src="/assets/{$file}" type="module" defer></script>
        HTML;
    foreach ($cssFiles as $css) {
        $html .=  <<<HTML
        <link rel="stylesheet" href="/assets/{$css}" />
        HTML;
    }
    return $html;
}
