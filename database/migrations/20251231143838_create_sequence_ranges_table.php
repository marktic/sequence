<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSequenceRangesTable extends AbstractMigration
{
    public function change(): void
    {
        // We disable the default ID to define an explicit BigInteger ID
        $table = $this->table('mkt_sequence_ranges', [
            'id' => false,
            'primary_key' => 'id'
        ]);

        $table->addColumn('id', 'biginteger', ['identity' => true, 'signed' => false])
            ->addColumn('tenant', 'string', ['limit' => 100])
            ->addColumn('tenant_id', 'biginteger', ['signed' => false])

            ->addColumn('name', 'string', ['limit' => 255])
            ->addColumn('number_start', 'biginteger', ['default' => null, 'null' => true, 'signed' => true])
            ->addColumn('number_current', 'biginteger', ['default' => 0, 'null' => true, 'signed' => true])
            ->addColumn('number_length', 'integer', ['default' => 4, 'null' => true, 'signed' => false])
            ->addColumn('number_end', 'biginteger', ['default' => 0, 'null' => true, 'signed' => true])

            ->addColumn('prefix', 'string', ['limit' => 50, 'default' => null, 'null' => true])

            ->addColumn('suffix', 'string', ['limit' => 50, 'default' => null, 'null' => true])
            ->addTimestamps()

            // Indexes
            ->addIndex(['tenant', 'tenant_id'])

            ->addIndex(
                ['tenant', 'tenant_id'],
            )
            ->create();
    }
}