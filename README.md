# Authenticator em Duas Etapas (2FA) - PHP

Este é um projeto de **Authenticator em Duas Etapas (2FA)** desenvolvido em **PHP puro**, utilizando as bibliotecas do **Google Authenticator** para gerar códigos temporários e autenticação segura. O objetivo é adicionar uma camada extra de segurança no processo de login, validando a identidade do usuário com um código temporário gerado a cada login, além da senha.

![Screenshot_1](https://github.com/user-attachments/assets/8f61edde-2740-4cea-b284-fef018a5d4ff)


## Funcionalidades

- **Geração de códigos temporários**: Gera códigos de 6 dígitos válidos por um tempo limitado.
- **Verificação de 2FA**: Requer que o usuário insira o código temporário gerado para completar o processo de login.
- **Interface de configuração**: Interface simples para o usuário configurar e ativar o 2FA.
- **Segurança**: Implementação do algoritmo TOTP (Time-Based One-Time Password) para geração de códigos.

## Tecnologias Utilizadas

- **Backend**: PHP (sem dependências externas, código puro)
- **Bibliotecas**: 
  - [Sonata Project Google Authenticator]
    - `GoogleAuthenticator.php` - Para a criação dos códigos temporários (TOTP).
    - `GoogleQrUrl.php` - Para gerar o link do código QR que pode ser escaneado pelo aplicativo Google Authenticator.
    - `FixedBitNotation.php` e `GoogleAuthenticatorInterface.php` - Para a implementação interna de funcionalidades relacionadas ao algoritmo de autenticação.
  
##

## Autores

- [Tiago Soares da Conceição](https://www.linkedin.com/in/tsgo27/)



---

## Licença
Copyright © 2025 Demo.

Este projeto é licenciado [MIT](https://choosealicense.com/licenses/mit/)


