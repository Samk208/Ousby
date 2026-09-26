# Fofana WP — Setup Script (Slice 1)
# Run from PowerShell in the Ousbe workspace
# Installs GeneratePress + GP Premium + all required plugins

$php   = "C:\Users\Lenovo\AppData\Local\Programs\Local\resources\extraResources\lightning-services\php-8.2.29+0\bin\win64\php.exe"
$ini   = "C:\Users\Lenovo\Desktop\Project\Ousbe\fofana-wp\scripts\wp-cli.ini"
$wp    = "C:\Users\Lenovo\Desktop\Project\Ousbe\fofana-wp\scripts\wp-cli.phar"
$p     = "C:\Users\Lenovo\Local Sites\ousbee\app\public"

function wp { param([Parameter(ValueFromRemainingArguments=$true)]$args) & $php -c $ini $wp --path=$p @args }

Write-Output "`n=== 1. Install GeneratePress theme ==="
wp theme install generatepress

Write-Output "`n=== 2. Activate child theme (fofana-child) ==="
wp theme activate fofana-child

Write-Output "`n=== 3. Install GP Premium plugin from vendor zip ==="
wp plugin install "C:\Users\Lenovo\Desktop\Project\Ousbe\vendor\gp-premium.zip" --activate

Write-Output "`n=== 4. Install GenerateBlocks ==="
wp plugin install generateblocks --activate

Write-Output "`n=== 5. Install ACF (free) ==="
wp plugin install advanced-custom-fields --activate

Write-Output "`n=== 6. Install Fluent Forms ==="
wp plugin install fluentform --activate

Write-Output "`n=== 7. Install Rank Math ==="
wp plugin install seo-by-rank-math --activate

Write-Output "`n=== 8. Install Wordfence ==="
wp plugin install wordfence --activate

Write-Output "`n=== 9. Install FluentSMTP ==="
wp plugin install fluent-smtp --activate

Write-Output "`n=== 10. Set language to fr_FR ==="
wp language core install fr_FR
wp site switch-language fr_FR

Write-Output "`n=== 11. Delete default plugins ==="
wp plugin delete hello akismet

Write-Output "`n=== 12. Set permalink structure ==="
wp rewrite structure "/%postname%/"
wp rewrite flush --hard

Write-Output "`n=== 13. Set static front page ==="
wp option update show_on_front page

Write-Output "`n=== 14. Plugin list ==="
wp plugin list

Write-Output "`n=== 15. Theme list ==="
wp theme list

Write-Output "`n=== Setup complete ==="
