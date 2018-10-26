<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181026121427 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ammproduct (id INT NOT NULL, company_id INT DEFAULT NULL, product_type VARCHAR(1) DEFAULT NULL, status VARCHAR(1) DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, commercial_type VARCHAR(1) DEFAULT NULL, immatriculation_date DATETIME DEFAULT NULL, professional_use TINYINT(1) NOT NULL, INDEX IDX_754B0F72979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ammproduct_ammproduct (ammproduct_source INT NOT NULL, ammproduct_target INT NOT NULL, INDEX IDX_F9324D9B5FDAD2D1 (ammproduct_source), INDEX IDX_F9324D9B463F825E (ammproduct_target), PRIMARY KEY(ammproduct_source, ammproduct_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_4FBF094F21B741A9 (ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE danger (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, caption VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_B6156075F67C4965 (caption), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE danger_ammproduct (danger_id INT NOT NULL, ammproduct_id INT NOT NULL, INDEX IDX_BE5CDDD53C5BE071 (danger_id), INDEX IDX_BE5CDDD557A2FDAC (ammproduct_id), PRIMARY KEY(danger_id, ammproduct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulation (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, caption VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_E8B17E5021B741A9 (ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formulation_ammproduct (formulation_id INT NOT NULL, ammproduct_id INT NOT NULL, INDEX IDX_89147D0F7273C0A (formulation_id), INDEX IDX_89147D0F57A2FDAC (ammproduct_id), PRIMARY KEY(formulation_id, ammproduct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mention (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, caption VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_E20259CD21B741A9 (ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mention_ammproduct (mention_id INT NOT NULL, ammproduct_id INT NOT NULL, INDEX IDX_D63F39657A4147F0 (mention_id), INDEX IDX_D63F396557A2FDAC (ammproduct_id), PRIMARY KEY(mention_id, ammproduct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE risk (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, caption VARCHAR(255) DEFAULT NULL, code VARCHAR(10) DEFAULT NULL, pict VARCHAR(10) DEFAULT NULL, UNIQUE INDEX UNIQ_7906D54121B741A9 (ref_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE risk_ammproduct (risk_id INT NOT NULL, ammproduct_id INT NOT NULL, INDEX IDX_78FB8E19235B6D1 (risk_id), INDEX IDX_78FB8E1957A2FDAC (ammproduct_id), PRIMARY KEY(risk_id, ammproduct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE substance (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, variant VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_E481CB19F143BFAD (variant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE substance_quantity (id INT AUTO_INCREMENT NOT NULL, substance_id INT NOT NULL, product_id INT NOT NULL, quantity NUMERIC(10, 5) NOT NULL, unit VARCHAR(10) NOT NULL, INDEX IDX_352844CFC707E018 (substance_id), INDEX IDX_352844CF4584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usage_condition (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, cat_ref_id VARCHAR(25) DEFAULT NULL, cat_name VARCHAR(100) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_C9EA0C504584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usecase (id INT AUTO_INCREMENT NOT NULL, ref_id VARCHAR(25) DEFAULT NULL, caption VARCHAR(100) DEFAULT NULL, UNIQUE INDEX UNIQ_A614E1B8F67C4965 (caption), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usecase_ammproduct (usecase_id INT NOT NULL, ammproduct_id INT NOT NULL, INDEX IDX_B666FBF5F0B37CEE (usecase_id), INDEX IDX_B666FBF557A2FDAC (ammproduct_id), PRIMARY KEY(usecase_id, ammproduct_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ammproduct ADD CONSTRAINT FK_754B0F72979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE ammproduct_ammproduct ADD CONSTRAINT FK_F9324D9B5FDAD2D1 FOREIGN KEY (ammproduct_source) REFERENCES ammproduct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ammproduct_ammproduct ADD CONSTRAINT FK_F9324D9B463F825E FOREIGN KEY (ammproduct_target) REFERENCES ammproduct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE danger_ammproduct ADD CONSTRAINT FK_BE5CDDD53C5BE071 FOREIGN KEY (danger_id) REFERENCES danger (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE danger_ammproduct ADD CONSTRAINT FK_BE5CDDD557A2FDAC FOREIGN KEY (ammproduct_id) REFERENCES ammproduct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formulation_ammproduct ADD CONSTRAINT FK_89147D0F7273C0A FOREIGN KEY (formulation_id) REFERENCES formulation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formulation_ammproduct ADD CONSTRAINT FK_89147D0F57A2FDAC FOREIGN KEY (ammproduct_id) REFERENCES ammproduct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mention_ammproduct ADD CONSTRAINT FK_D63F39657A4147F0 FOREIGN KEY (mention_id) REFERENCES mention (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mention_ammproduct ADD CONSTRAINT FK_D63F396557A2FDAC FOREIGN KEY (ammproduct_id) REFERENCES ammproduct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE risk_ammproduct ADD CONSTRAINT FK_78FB8E19235B6D1 FOREIGN KEY (risk_id) REFERENCES risk (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE risk_ammproduct ADD CONSTRAINT FK_78FB8E1957A2FDAC FOREIGN KEY (ammproduct_id) REFERENCES ammproduct (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE substance_quantity ADD CONSTRAINT FK_352844CFC707E018 FOREIGN KEY (substance_id) REFERENCES substance (id)');
        $this->addSql('ALTER TABLE substance_quantity ADD CONSTRAINT FK_352844CF4584665A FOREIGN KEY (product_id) REFERENCES ammproduct (id)');
        $this->addSql('ALTER TABLE usage_condition ADD CONSTRAINT FK_C9EA0C504584665A FOREIGN KEY (product_id) REFERENCES ammproduct (id)');
        $this->addSql('ALTER TABLE usecase_ammproduct ADD CONSTRAINT FK_B666FBF5F0B37CEE FOREIGN KEY (usecase_id) REFERENCES usecase (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usecase_ammproduct ADD CONSTRAINT FK_B666FBF557A2FDAC FOREIGN KEY (ammproduct_id) REFERENCES ammproduct (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ammproduct_ammproduct DROP FOREIGN KEY FK_F9324D9B5FDAD2D1');
        $this->addSql('ALTER TABLE ammproduct_ammproduct DROP FOREIGN KEY FK_F9324D9B463F825E');
        $this->addSql('ALTER TABLE danger_ammproduct DROP FOREIGN KEY FK_BE5CDDD557A2FDAC');
        $this->addSql('ALTER TABLE formulation_ammproduct DROP FOREIGN KEY FK_89147D0F57A2FDAC');
        $this->addSql('ALTER TABLE mention_ammproduct DROP FOREIGN KEY FK_D63F396557A2FDAC');
        $this->addSql('ALTER TABLE risk_ammproduct DROP FOREIGN KEY FK_78FB8E1957A2FDAC');
        $this->addSql('ALTER TABLE substance_quantity DROP FOREIGN KEY FK_352844CF4584665A');
        $this->addSql('ALTER TABLE usage_condition DROP FOREIGN KEY FK_C9EA0C504584665A');
        $this->addSql('ALTER TABLE usecase_ammproduct DROP FOREIGN KEY FK_B666FBF557A2FDAC');
        $this->addSql('ALTER TABLE ammproduct DROP FOREIGN KEY FK_754B0F72979B1AD6');
        $this->addSql('ALTER TABLE danger_ammproduct DROP FOREIGN KEY FK_BE5CDDD53C5BE071');
        $this->addSql('ALTER TABLE formulation_ammproduct DROP FOREIGN KEY FK_89147D0F7273C0A');
        $this->addSql('ALTER TABLE mention_ammproduct DROP FOREIGN KEY FK_D63F39657A4147F0');
        $this->addSql('ALTER TABLE risk_ammproduct DROP FOREIGN KEY FK_78FB8E19235B6D1');
        $this->addSql('ALTER TABLE substance_quantity DROP FOREIGN KEY FK_352844CFC707E018');
        $this->addSql('ALTER TABLE usecase_ammproduct DROP FOREIGN KEY FK_B666FBF5F0B37CEE');
        $this->addSql('DROP TABLE ammproduct');
        $this->addSql('DROP TABLE ammproduct_ammproduct');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE danger');
        $this->addSql('DROP TABLE danger_ammproduct');
        $this->addSql('DROP TABLE formulation');
        $this->addSql('DROP TABLE formulation_ammproduct');
        $this->addSql('DROP TABLE mention');
        $this->addSql('DROP TABLE mention_ammproduct');
        $this->addSql('DROP TABLE risk');
        $this->addSql('DROP TABLE risk_ammproduct');
        $this->addSql('DROP TABLE substance');
        $this->addSql('DROP TABLE substance_quantity');
        $this->addSql('DROP TABLE usage_condition');
        $this->addSql('DROP TABLE usecase');
        $this->addSql('DROP TABLE usecase_ammproduct');
    }
}
