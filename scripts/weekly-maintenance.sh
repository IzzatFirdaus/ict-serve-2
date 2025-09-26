#!/bin/bash
# Script penyelenggaraan mingguan

echo "=== ICTServe Weekly Maintenance ==="
echo "Starting at: $(date)"

# 1. Backup verification
echo "Verifying backups..."
php artisan backup:monitor

# 2. Database optimization
echo "Optimizing database..."
php artisan db:optimize

# 3. Clear caches
echo "Clearing application caches..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# 4. Update application caches
echo "Rebuilding optimized caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 5. Check queue health
echo "Checking queue status..."
php artisan queue:monitor

# 6. Security scan
echo "Running security checks..."
php artisan security:check

# 7. Performance test
echo "Running performance tests..."
php artisan performance:test

# 8. Generate maintenance report
echo "Generating maintenance report..."
php artisan maintenance:report --weekly

echo "Maintenance completed at: $(date)"
