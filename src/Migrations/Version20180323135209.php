<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180323135209 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_97A0ADA3A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ticket AS SELECT id, user_id, title, description, probleme, date FROM ticket');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, title CLOB NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, probleme CLOB NOT NULL COLLATE BINARY, date DATETIME NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_97A0ADA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ticket (id, user_id, title, description, probleme, date) SELECT id, user_id, title, description, probleme, date FROM __temp__ticket');
        $this->addSql('DROP TABLE __temp__ticket');
        $this->addSql('CREATE INDEX IDX_97A0ADA3A76ED395 ON ticket (user_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_97A0ADA3A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ticket AS SELECT id, user_id, title, description, probleme, date FROM ticket');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, user_id INTEGER DEFAULT NULL, title CLOB NOT NULL, description CLOB NOT NULL, probleme CLOB NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO ticket (id, user_id, title, description, probleme, date) SELECT id, user_id, title, description, probleme, date FROM __temp__ticket');
        $this->addSql('DROP TABLE __temp__ticket');
        $this->addSql('CREATE INDEX IDX_97A0ADA3A76ED395 ON ticket (user_id)');
    }
}
