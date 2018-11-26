<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126122209 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE composant (id INT AUTO_INCREMENT NOT NULL, nom_composant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composer (id INT AUTO_INCREMENT NOT NULL, medicament_id INT DEFAULT NULL, composant_id INT NOT NULL, quantite INT NOT NULL, INDEX IDX_987306D8AB0D61F7 (medicament_id), INDEX IDX_987306D87F3310E7 (composant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, nom_famille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicaments (id INT AUTO_INCREMENT NOT NULL, famille_id INT NOT NULL, nom_commercial VARCHAR(255) NOT NULL, prix_echantillon DOUBLE PRECISION NOT NULL, contre_indication VARCHAR(255) DEFAULT NULL, effet VARCHAR(255) NOT NULL, INDEX IDX_DD988ACB97A77B84 (famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE composer ADD CONSTRAINT FK_987306D8AB0D61F7 FOREIGN KEY (medicament_id) REFERENCES medicaments (id)');
        $this->addSql('ALTER TABLE composer ADD CONSTRAINT FK_987306D87F3310E7 FOREIGN KEY (composant_id) REFERENCES composant (id)');
        $this->addSql('ALTER TABLE medicaments ADD CONSTRAINT FK_DD988ACB97A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE composer DROP FOREIGN KEY FK_987306D87F3310E7');
        $this->addSql('ALTER TABLE medicaments DROP FOREIGN KEY FK_DD988ACB97A77B84');
        $this->addSql('ALTER TABLE composer DROP FOREIGN KEY FK_987306D8AB0D61F7');
        $this->addSql('DROP TABLE composant');
        $this->addSql('DROP TABLE composer');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE medicaments');
        $this->addSql('DROP TABLE user');
    }
}
