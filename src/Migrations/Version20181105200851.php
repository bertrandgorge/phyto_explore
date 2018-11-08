<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181105200851 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE yearly_ammusage (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, year INT NOT NULL, department VARCHAR(10) DEFAULT NULL, quantity NUMERIC(10, 1) NOT NULL, unit VARCHAR(5) NOT NULL, INDEX IDX_1D6D2F334584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE yearly_ammusage ADD CONSTRAINT FK_1D6D2F334584665A FOREIGN KEY (product_id) REFERENCES ammproduct (id)');
        $this->addSql('ALTER TABLE substance ADD bnvd_name VARCHAR(255) DEFAULT NULL, ADD cas VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE substance_quantity CHANGE unit unit VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE yearly_ammusage');
        $this->addSql('ALTER TABLE substance DROP bnvd_name, DROP cas');
        $this->addSql('ALTER TABLE substance_quantity CHANGE unit unit VARCHAR(10) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
