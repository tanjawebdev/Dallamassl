import { execSync } from 'child_process';
import fs from 'fs-extra';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Configuration
const THEME_NAME = 'alwera';
const SOURCE_DIR = __dirname;
const BUILD_DIR = path.resolve(__dirname, '..', '..', '..', 'alwera-build');
const DIST_DIR = path.join(BUILD_DIR, THEME_NAME);

// Files and folders to include in the final theme
const INCLUDE_PATTERNS = [
    // WordPress theme files
    '*.php',
    'style.css',
    'screenshot.png',
    'readme.md',

    // Theme directories (these will be copied entirely)
    'acf-json/**/*',
    'configure/**/*',
    'partials/**/*',
    'template-parts/**/*',
    'templates/**/*',
    'languages/**/*',
    'static/**/*',

    // Built assets (will be copied from temporary build)
    'assets/dist/**/*',

    // Composer files (if needed for production)
    'composer.json',
    'composer.lock',
    'vendor/**/*'
];

// Files and folders to explicitly exclude
const EXCLUDE_PATTERNS = [
    'node_modules',
    'assets/src',
    'assets/dist', // Will be replaced with fresh build
    '.git',
    '.github',
    '.gitignore',
    '.editorconfig',
    '.DS_Store',
    '.nvmrc',
    'package.json',
    'package-lock.json',
    'vite.config.js',
    'biome.json',
    'build-theme.js',
    '_RESSOURCES'
];

console.log('🚀 Starting WordPress theme build process...\n');

// Step 1: Clean build directory
console.log('📦 Step 1: Cleaning build directory...');
if (fs.existsSync(BUILD_DIR)) {
    fs.removeSync(BUILD_DIR);
    console.log('   ✓ Removed old build directory');
}
fs.ensureDirSync(DIST_DIR);
console.log('   ✓ Created fresh build directory\n');

// Step 2: Run Vite build
console.log('🔨 Step 2: Building assets with Vite...');
try {
    execSync('npm run build', {
        stdio: 'inherit',
        cwd: SOURCE_DIR
    });
    console.log('   ✓ Vite build completed\n');
} catch (error) {
    console.error('   ✗ Vite build failed!');
    process.exit(1);
}

// Step 3: Copy theme files
console.log('📋 Step 3: Copying theme files...');

// Copy all PHP files
const phpFiles = fs.readdirSync(SOURCE_DIR).filter(file => file.endsWith('.php'));
phpFiles.forEach(file => {
    fs.copySync(
        path.join(SOURCE_DIR, file),
        path.join(DIST_DIR, file)
    );
});
console.log(`   ✓ Copied ${phpFiles.length} PHP files`);

// Copy essential files
const essentialFiles = ['style.css', 'screenshot.png', 'readme.md'];
essentialFiles.forEach(file => {
    const sourcePath = path.join(SOURCE_DIR, file);
    if (fs.existsSync(sourcePath)) {
        fs.copySync(sourcePath, path.join(DIST_DIR, file));
        console.log(`   ✓ Copied ${file}`);
    }
});

// Copy directories
const directories = [
    'acf-json',
    'configure',
    'partials',
    'template-parts',
    'templates',
    'languages',
    'static'
];

directories.forEach(dir => {
    const sourcePath = path.join(SOURCE_DIR, dir);
    if (fs.existsSync(sourcePath)) {
        fs.copySync(sourcePath, path.join(DIST_DIR, dir));
        console.log(`   ✓ Copied ${dir}/`);
    }
});

// Copy built assets
const assetsDistPath = path.join(SOURCE_DIR, 'assets', 'dist');
if (fs.existsSync(assetsDistPath)) {
    fs.copySync(
        assetsDistPath,
        path.join(DIST_DIR, 'assets', 'dist')
    );
    console.log('   ✓ Copied built assets');
}

// Copy composer files if they exist
if (fs.existsSync(path.join(SOURCE_DIR, 'composer.json'))) {
    fs.copySync(
        path.join(SOURCE_DIR, 'composer.json'),
        path.join(DIST_DIR, 'composer.json')
    );
    console.log('   ✓ Copied composer.json');
}

if (fs.existsSync(path.join(SOURCE_DIR, 'composer.lock'))) {
    fs.copySync(
        path.join(SOURCE_DIR, 'composer.lock'),
        path.join(DIST_DIR, 'composer.lock')
    );
    console.log('   ✓ Copied composer.lock');
}

// Copy vendor folder if exists (Composer dependencies)
const vendorPath = path.join(SOURCE_DIR, 'vendor');
if (fs.existsSync(vendorPath)) {
    fs.copySync(vendorPath, path.join(DIST_DIR, 'vendor'));
    console.log('   ✓ Copied vendor/');
}

console.log('\n');

// Step 4: Clean up source build artifacts
console.log('🧹 Step 4: Cleaning up source directory...');
const sourceDistPath = path.join(SOURCE_DIR, 'assets', 'dist');
if (fs.existsSync(sourceDistPath)) {
    fs.removeSync(sourceDistPath);
    console.log('   ✓ Removed assets/dist from source\n');
}

// Step 5: Create ZIP file
console.log('📦 Step 5: Creating ZIP file...');
try {
    const zipFileName = `${THEME_NAME}.zip`;
    const zipFilePath = path.join(BUILD_DIR, zipFileName);

    // Remove old zip if exists
    if (fs.existsSync(zipFilePath)) {
        fs.removeSync(zipFilePath);
    }

    // Create zip using native zip command
    execSync(`cd "${BUILD_DIR}" && zip -r "${zipFileName}" "${THEME_NAME}" -x "*.DS_Store"`, {
        stdio: 'inherit'
    });

    console.log(`   ✓ Created ${zipFileName}\n`);
} catch (error) {
    console.error('   ✗ ZIP creation failed!');
    console.error(error);
    process.exit(1);
}

// Final summary
console.log('✅ Build completed successfully!\n');
console.log('📍 Build location:');
console.log(`   ${DIST_DIR}\n`);
console.log('📦 ZIP file ready for upload:');
console.log(`   ${path.join(BUILD_DIR, THEME_NAME + '.zip')}\n`);
console.log('💡 You can now upload the ZIP file to WordPress!\n');
