# codeigniter_on_docker
develop enviroment for codeigniter

## Version Info
||ver|
|---|---|
|php|7.4|
|CodeIgniter|3.1.11|
|MySQL|5.7|

<br>

## Xdebug + VSCode configuration
xdebugの`remote_port`は`9010`を指定しています。  
そのためVSCodeの`launch.json`を以下のように設定にします。
### Example
```json
// launch.json
{
  "version": "0.2.0",
  "configurations": [
    {
      "name": "Listen for XDebug",
      "type": "php",
      "request": "launch",
      "port": 9012,
      "pathMappings": {
        "/var/www": "${workspaceFolder}/src"
      }
    }
  ]
}
```

<br>

## Notes
- migrationについて  
  CodeIgniterではマイグレーション機能は存在しますが、マイグレーションファイルは**手動で作成**する必要があります。  
  `application/config/migration.php`で`$config['migration_type'] = 'timestamp'`と指定している為マイグレーションファイルのprefixには作成日時を`YYYYMMDDHHIISS`のフォーマットで指定します。
  ```
  例)
  20210101000000_create_users_table.php
  ```  
  また、マイグレーションファイルは`application/database/migrations`配下に作成してください。
  - マイグレートの実行はappコンテナ内のDocumentrootディレクトリで下記コマンドを実行
  ```sh
  $ php index.php migrate
  ```

<br>

## TODO
- dotenvを使用可能にする: [資料](https://pgmemo.tokyo/category/23/tag/CodeIgniter/)
- CLIでmigrationファイル生成: [資料](http://blog.a-way-out.net/blog/2015/05/07/codeigniter-cli/)