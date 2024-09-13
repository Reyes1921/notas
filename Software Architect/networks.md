[Volver al Menú](./root.md)

# `Networks`

# `OSI and TCP/IP Models`

The OSI and TCP/IP model is used to help the developer to design their system for interoperability. The OSI model has 7 layers while the TCP/IP model has a more summarized form of the OSI model only consisting 4 layers. This is important if you’re are trying to design a system to communicate with other systems.

[Mas Info](/internet/NotasGeneralInternet.md)

# `TCP/IP Model`

The TCP/IP model defines how devices should transmit data between them and enables communication over networks and large distances. The model represents how data is exchanged and organized over networks. It is split into four layers, which set the standards for data exchange and represent how data is handled and packaged when being delivered between applications, devices, and servers.

## `The four layers of the TCP/IP model are as follows:`

- `Datalink layer`: The datalink layer defines how data should be sent, handles the physical act of sending and receiving data, and is responsible for transmitting data between applications or devices on a network. This includes defining how data should be signaled by hardware and other transmission devices on a network, such as a computer’s device driver, an Ethernet cable, a network interface card (NIC), or a wireless network. It is also referred to as the link layer, network access layer, network interface layer, or physical layer and is the combination of the physical and data link layers of the Open Systems Interconnection (OSI) model, which standardizes communications functions on computing and telecommunications systems.

- `Internet layer`: The internet layer is responsible for sending packets from a network and controlling their movement across a network to ensure they reach their destination. It provides the functions and procedures for transferring data sequences between applications and devices across networks.
- `Transport layer`: The transport layer is responsible for providing a solid and reliable data connection between the original application or device and its intended destination. This is the level where data is divided into packets and numbered to create a sequence. The transport layer then determines how much data must be sent, where it should be sent to, and at what rate. It ensures that data packets are sent without errors and in sequence and obtains the acknowledgment that the destination device has received the data packets.

- `Application layer`: The application layer refers to programs that need TCP/IP to help them communicate with each other. This is the level that users typically interact with, such as email systems and messaging platforms. It combines the session, presentation, and application layers of the OSI model.

# `Http Https`

HTTP is the TCP/IP based application layer communication protocol which standardizes how the client and server communicate with each other. It defines how the content is requested and transmitted across the internet.

HTTPS (Hypertext Transfer Protocol Secure) is the secure version of HTTP, which is the primary protocol used to send data between a web browser and a website.

[Mas Info](/internet/protocolos/protocolos.md)

# `Proxies`

In computer networking, a proxy server is a server application that acts as an intermediary between a client requesting a resource and the server providing that resource.

# `Firewalls`

A Firewall is a network security device that monitors and filters incoming and outgoing network traffic based on an organization’s previously established security policies.

## `Observación`

Se utiliza un firewall para definir el perímetro de la red e identificar y bloquear el tráfico potencialmente sospechoso y malicioso. Por otro lado, un proxy ayuda a proteger la privacidad y puede ayudar a hacer cumplir las políticas corporativas con respecto a la navegación por Internet.

[TOP](#networks)
