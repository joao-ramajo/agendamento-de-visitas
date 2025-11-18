<?php

require_once dirname(__DIR__, 1) . '/config/bootstrap.php';

use Infra\Database\PdoConnection;

$pdo = new PdoConnection(
    $_ENV['DB_HOST'],
    $_ENV['DB_NAME'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
);

$sql = "
INSERT INTO vehicles (image_url, brand, model, version, price, city, uf) VALUES
-- Carros
('https://cdn.site.com/cars/gol.png', 'Volkswagen', 'Gol', '1.0 MSI', 55000, 'Carapicuíba', 'SP'),
('https://cdn.site.com/cars/argo.png', 'Fiat', 'Argo', '1.3 Trekking', 72000, 'Osasco', 'SP'),
('https://cdn.site.com/cars/corolla.png', 'Toyota', 'Corolla', 'Altis 2.0', 135000, 'São Paulo', 'SP'),

-- Motos
('https://cdn.site.com/moto/cg160.png', 'Honda', 'CG 160', 'Start', 13000, 'Mogi das Cruzes', 'SP'),
('https://cdn.site.com/moto/fazer250.png', 'Yamaha', 'Fazer 250', 'ABS', 21000, 'Guarulhos', 'SP'),
('https://cdn.site.com/moto/nmax.png', 'Yamaha', 'NMax 160', 'ABS', 17500, 'Barueri', 'SP');
";

$pdo->getConnection()->exec($sql);

echo "Seed finished.\n";
