[Volver al Menú](root.md)

# `Domain Name?`

Domain names are a key part of the Internet infrastructure. They provide a human-readable address for any web server available on the Internet.

Any Internet-connected computer can be reached through a public IP Address, either an IPv4 address (e.g. 173.194.121.32) or an IPv6 address (e.g., 2027:0da8:8b73:0000:0000:8a2e:0370:1337).

Computers can handle such addresses easily, but people have a hard time finding out who is running the server or what service the website offers. IP addresses are hard to remember and might change over time.

# `Structure of domain names`

A domain name has a simple structure made of several parts (it might be one part only, two, three…), separated by dots and read from right to left:

<img src="domain.png" />

## `TLD (Top-Level Domain)`

TLDs tell users the general purpose of the service behind the domain name. The most generic TLDs (.com, .org, .net) don't require web services to meet any particular criteria, but some TLDs enforce stricter policies so it is clearer what their purpose is. For example:

- Local TLDs such as .us, .fr, or .se can require the service to be provided in a given language or hosted in a certain country — they are supposed to indicate a resource in a particular language or country.

- TLDs containing .gov are only allowed to be used by government departments.

- The .edu TLD is only for use by educational and academic institutions.

## `Label (or component)`

The labels are what follow the TLD. A label is a case-insensitive character sequence anywhere from one to sixty-three characters in length, containing only the letters A through Z, digits 0 through 9, and the '-' character (which may not be the first or last character in the label). a, 97, and hello-strange-person-16-how-are-you are all examples of valid labels.

The label located right before the TLD is also called a Secondary Level Domain (SLD).

A domain name can have many labels (or components). It is not mandatory nor necessary to have 3 labels to form a domain name. For instance, www.inf.ed.ac.uk is a valid domain name. For any domain you control (e.g. mozilla.org), you can create "subdomains" with different content located at each, like developer.mozilla.org, iot.mozilla.org, or bugzilla.mozilla.org.

## `Who owns a domain name?`

La adquisición es el proceso de alquilar el derecho a usar un nombre específico por un período de tiempo (generalmente de 1 a 10 años). Esto se hace a través de un Registrador de Dominios (como Cloudflare, Namecheap, GoDaddy, o DonDominio).

You cannot "buy a domain name". This is so that unused domain names eventually become available to be used again by someone else. If every domain name was bought, the web would quickly fill up with unused domain names that were locked and couldn't be used by anyone.

Instead, you pay for the right to use a domain name for one or more years. You can renew your right, and your renewal has priority over other people's applications. But you never own the domain name.

Companies called registrars use domain name registries to keep track of technical and administrative information connecting you to your domain name.

# `Asignación y Setup Básico (Gestión de DNS)`

Una vez que compras el dominio, este no hace nada por sí solo. Tienes que "asignarlo" o apuntarlo hacia donde tienes alojada tu página web (Hosting) o tu correo electrónico. Esto se hace mediante los Servidores de Nombres (Nameservers) y los Registros DNS.

# `Los Registros DNS más importantes`

- Registro `A`: registro que contiene la dirección IPv4  de un dominio. 
- Registro `AAAA`: El registro que contiene la dirección IPv6 de un dominio (a diferencia de los registros A, que enumeran la dirección IPv4).
- Registro `CNAME`: reenvía un dominio o subdominio a otro dominio, NO proporciona una dirección IP. Hacer que `www.tudominio.com` apunte a `tudominio.com`.
- Registro `MX`: dirige el correo a un servidor de correo electrónico.
- Registro `TXT`: Permite que un administrador pueda almacenar notas de texto en el registro. Estos registros se suelen utilizar para la seguridad del correo electrónico.
- Registro `NS`: almacena el servidor de nombres para una entrada DNS.
- Registro `SOA`: almacena la información del administrador sobre un dominio.
- Registro `SRV`: especifica un puerto para servicios específicos.
- Registro `PTR`: proporciona un nombre de dominio en búsquedas inversas.

# `Migración (Transferencia de Dominio)`

- Regla de los 60 días: No puedes transferir un dominio si fue comprado o transferido por última vez hace menos de 60 días.
- Desbloqueo (Registrar Lock): Debes ir al panel de tu registrador actual y desactivar el "Bloqueo de transferencia".
- Código de Autorización (Auth Code / EPP Code): Tienes que solicitar este código al registrador actual. Es como un PIN de seguridad.
- Inicio de transferencia: Vas al nuevo registrador, pones el dominio, ingresas el Auth Code y pagas (generalmente esto añade un año extra de vigencia al dominio).
- Aprobación: Recibirás un correo para aprobar la transferencia. Puede tardar entre unas horas y 7 días en completarse.

# `Activación y Propagación`

- ¿Qué es la propagación? Es el tiempo que tardan los servidores de internet de todo el planeta (los de los proveedores de internet como Movistar, Cantv, etc.) en actualizar su caché y reconocer la nueva dirección de tu dominio.
- Tiempo estimado: Oficialmente puede tardar hasta 48 horas, aunque en la práctica moderna suele tomar entre 15 minutos y un par de horas.
- El factor TTL (Time To Live): Es un valor en tu configuración DNS que le dice a los servidores del mundo con qué frecuencia deben revisar si hay cambios. Tip: Si planeas una migración, baja el TTL a 300 segundos (5 minutos) un día antes. Así, cuando hagas el cambio real, la propagación será casi inmediata.

# `Seguridad del Dominio`

- Privacidad WHOIS: Oculta tu nombre, dirección y teléfono de la base de datos pública de dominios para evitar spam y ataques de ingeniería social. Muchos registradores lo ofrecen gratis.
- Bloqueo de Registrador (Registrar Lock): Mantenlo siempre activado. Evita que alguien inicie una transferencia no autorizada.
- Autenticación de dos factores (2FA): Activa el 2FA en la cuenta de tu registrador. Si alguien roba tu contraseña, no podrá entrar a robarte el dominio.
- DNSSEC: Es un sistema que firma criptográficamente tus registros DNS. Evita ataques de "DNS Spoofing" (donde un atacante redirige secretamente a tus visitantes a una web falsa).
- SPF, DKIM y DMARC (Seguridad de Correo): Son registros TXT vitales. Le dicen al mundo qué servidores tienen permiso para enviar correos en nombre de tu dominio, evitando que los estafadores envíen correos falsos haciéndose pasar por ti.

# `Los Registros de Correo: Cómo asegurar que tus emails lleguen y no caigan en Spam`

Configurar el correo no es solo recibir mensajes; es demostrarle a Gmail, Outlook y otros proveedores que tú eres quien dices ser. Para eso usamos los registros MX y TXT.

## `El Registro MX (La dirección de entrega)`

El registro MX (Mail Exchange) le dice a internet: "Cuando alguien escriba un correo a hola@midominio.com, envíalo a este servidor exacto".

- Si usas Google Workspace, tu registro MX apuntará a los servidores de Google. Si usas el correo gratuito de tu hosting (cPanel), apuntará allí.
- La Prioridad: Los registros MX siempre llevan un número de prioridad (0, 10, 20). El número más bajo es el servidor principal. Si ese falla, el correo intenta entregarse al siguiente número.

## `Los Registros TXT (La santísima trinidad de la seguridad)`

Para evitar que un estafador envíe correos haciéndose pasar por ti y arruine la reputación de tu dominio, debes configurar tres registros TXT específicos. Piensa en ellos como la seguridad de un aeropuerto:

- `SPF` (Sender Policy Framework) - "La Lista de Invitados":

Es un registro TXT que contiene una lista de las direcciones IP y servidores que tienen permiso oficial para enviar correos en tu nombre.

    - Ejemplo: Si solo usas Google para enviar correos, el SPF dirá: "Solo acepten correos de los servidores de Google". Si alguien intenta enviar un email usando un servidor en Rusia con tu nombre, el destinatario verá que no está en la lista (SPF) y lo mandará a spam.

- `DKIM` (DomainKeys Identified Mail) - "El Sello de Cera":

Es otro registro TXT que funciona como una firma digital invisible (criptografía).

    - Cómo funciona: Tu servidor "firma" cada correo que sale. El servidor de quien lo recibe revisa tu registro DKIM público para comprobar esa firma. Esto garantiza que el correo no fue interceptado ni alterado en el camino.

- `DMARC` - "Las Instrucciones para el Guardia":

Es el jefe de los dos anteriores. Le dice a los servidores que reciben tu correo qué hacer si un mensaje falla las pruebas de SPF o DKIM.

    -Puedes configurarlo para que diga: "Si un correo dice ser mío pero falla el SPF o DKIM, recházalo (Reject), ponlo en cuarentena (Quarantine) o déjalo pasar pero avísame (None)".

# `Cómo Asignar el Dominio a tu Hosting`

## `Opción A: Cambiar los Nameservers (La vía más fácil y común)`

Opción A: Cambiar los Nameservers (La vía más fácil y común)
Cuando contratas un hosting (como Hostinger, Banahosting, SiteGround), ellos te enviarán un correo de bienvenida con 2 a 4 direcciones llamadas Nameservers (DNS). Se ven así:

- ns1.tu-hosting.com
- ns2.tu-hosting.com

¿Qué necesitas hacer?

- Entras al panel donde compraste tu dominio (tu registrador).
- Buscas la opción "Servidores de Nombres" o "Nameservers".
- Borras los que vienen por defecto y pegas los que te dio tu hosting.

Resultado: Le acabas de dar el control total de tu dominio a tu hosting. A partir de ahora, cualquier cambio de correos (los MX y TXT que vimos arriba) los harás directamente en el panel de tu hosting (ej. cPanel).

## `Opción B: Cambiar el Registro A (Para usuarios con más experiencia)`

En esta opción, mantienes el control de los DNS en tu registrador de dominios (o usando un intermediario de seguridad como Cloudflare), y solo "apuntas" la web hacia el hosting.

¿Qué necesitas hacer?

- Entras a tu hosting y buscas cuál es la Dirección IP de tu servidor (ej. 192.168.1.150).
- Entras a tu registrador de dominios, vas a la Zona DNS y creas un Registro A.
- Pones que el nombre @ (que significa tu dominio raíz) apunte a esa IP.

Resultado: El dominio dirige a los visitantes a tu web, pero tú sigues manejando los correos y otras configuraciones desde el registrador original, no desde el hosting.

[TOP](#domain-name)
