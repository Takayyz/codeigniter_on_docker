<?php
class Migration_create_users_table extends CI_Migration {

    public function __construct()
    {
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {
        $fields = [
            // idフィールドのみデフォルトでauto_increment指定される
            'id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100
            ],
            'age' => [
                'type' => 'INT',
                'null' => TRUE,
            ],
            // 連想配列で'dafault'値に'CURRENT_TIMESTAMP'を指定するとセキュリティ上CURRENT_TIMESTAMPがエスケープされマイグレーションでエラーになるのでクエリ直書き
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ];
        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        // 第二引数にTRUEを渡すことで'DROP TABLE IF EXISTS table_name'になる
        $this->dbforge->drop_table('users', TRUE);
    }
}
