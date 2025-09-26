ONE PIECE – CRUD MVC (PHP)
--------------------------------
1) Importar o SQL: sql/onepiece_schema.sql (cria o DB 'onepiece').
2) Ajustar util/config.php se necessário (host/usuário/senha).
3) Acessar: index.php (redireciona para view/personagens/listar.php).

Entidades:
- racas (fixa)
- afiliacoes (fixa)
- personagens (CRUD): nome, idade, akuma_no_mi, raca_id, afiliacao_id, recompensa, descricao, image_url.

Requisitos atendidos:
- 2 SELECT obrigatórios (raça/afiliação)
- Validação back-end (service/PersonagemService.php)
- Bootstrap no header
- Aba de cards (view/personagens/cards.php)
