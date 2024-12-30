<?php
ob_start();

// ***** put the files you want here *****
$phpFiles = [
    'index.php',
    'about.php',
    'contact.php',
];

$outputDir = __DIR__ . '/mirror_html';

if (!file_exists($outputDir)) {
    mkdir($outputDir, 0777, true);
}

function generateMirror(array $files, string $outputDir)
{
    foreach ($files as $phpFile) {
        if (!file_exists($phpFile)) {
            echo "File not found: $phpFile\n";
            continue;
        }

        $baseName = basename($phpFile, '.php');
        $htmlPath = $outputDir . '/' . $baseName . '.html';

        ob_start();
        include $phpFile;
        $htmlContent = ob_get_clean();

        file_put_contents($htmlPath, $htmlContent);

        echo "Generated: $htmlPath\n";
    }
}

generateMirror($phpFiles, $outputDir);

echo "Mirror HTML project generated in: $outputDir\n";

chdir($outputDir);

if (!file_exists('package.json')) {
    echo "Initializing npm...\n";
    shell_exec('npm init -y');
}

if (!file_exists('node_modules/tailwindcss')) {
    echo "Installing Tailwind CSS...\n";
    shell_exec('npm install tailwindcss');
}

if (!file_exists('tailwind.config.js')) {
    echo "Generating Tailwind CSS config...\n";
    shell_exec('npx tailwindcss init');
}

$cssInputPath = $outputDir . '/input.css';
if (!file_exists($cssInputPath)) {
    file_put_contents($cssInputPath, "@tailwind base;\n@tailwind components;\n@tailwind utilities;");
    echo "Created input.css\n";
}

$outputCssPath = $outputDir . '/output.css';
echo "Building Tailwind CSS...\n";
shell_exec("npx tailwindcss -i input.css -o output.css --minify");

if (file_exists($outputCssPath)) {
    echo "Tailwind CSS built successfully: $outputCssPath\n";
} else {
    echo "Failed to build Tailwind CSS.\n";
}

ob_end_flush();
