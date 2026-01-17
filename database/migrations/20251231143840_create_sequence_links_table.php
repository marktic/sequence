<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSequenceLinksTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('mkt_sequence_links', [
            'id' => false,
            'primary_key' => 'id'
        ]);

        $table->addColumn('id', 'biginteger', ['identity' => true, 'signed' => false])
            ->addColumn('range_id', 'biginteger', ['signed' => false])
            ->addColumn('link_type', 'string', ['limit' => 100])
            ->addColumn('link_id', 'biginteger', ['signed' => false])
            ->addTimestamps()
            ->addIndex(['link_type', 'link_id'])
            ->addIndex(['range_id'])
            ->addForeignKey('range_id', 'sequence_ranges', 'id', [
                'delete' => 'CASCADE',
                'update' => 'NO_ACTION'
            ])
            ->create();
    }
}