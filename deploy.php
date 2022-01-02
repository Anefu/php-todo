<?php
namespace Deployer;
require 'recipe/common.php';
require 'recipe/laravel.php';

//Project Name
set('application', 'Todo');

//Set Repository
set('repository', 'git@github.com:Anefu/php-todo.git');

set('shared_files', []);
set('shared_dirs', []);

set('writable_dirs', []);
set('allow_annonymous_stats', false);

//Hosts
host('web1')
    ->set('hostname', '10.0.32.104')
    ->set('deploy_path', "/var/www/html/deployer")
    ->set('remote_user', 'ubuntu');

// Tasks
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:symlink',
    'artisan:migrate'
    'artisan:key:generate',
    'artisan:db:seed',
    'restart-nginx'
    'cleanup'
]);

task ('restart-nginx', function(){
    run('sudo systemctl reload nginx');
    run('sudo systemctl restart php-fpm')
});