[Volver al Menú](./root.md)

# `Security Assertion Markup Language (SAML)`

`SAML` stands for Security Assertion Markup Language. It is an XML-based standard for exchanging authentication and authorization data between parties, particularly between an identity provider (IdP) and a service provider (SP). In a SAML-based system, a user requests access to a protected resource. The service provider asks the identity provider to authenticate the user and assert whether they are granted access to the resource.

# `Benefits of SAML`

Some advantages of using SAML include:

- `Single Sign-On (SSO)`: Users can log in once at the IdP and access multiple service providers without needing to authenticate again.
- `Improved security`: Passwords and user credentials are not required to be stored and managed by the service provider, reducing the potential vectors for attack.
- `Increased efficiency`: As users no longer need to maintain multiple sets of credentials, managing access becomes easier for both the user and the system administrators.
- `Interoperability`: SAML enables a wide range of applications to work together, regardless of the underlying technology or platform.

# `SAML Components`

Three main components are involved in the SAML architecture:

- `Identity Provider (IdP)`: The entity that manages users’ identities and authenticates them by providing security tokens, also called assertions.
- `Service Provider (SP)`: The entity that provides a service (such as a web application or API) and relies on the identity provider to authenticate users and grant/deny access to the resources.
- `User/Principal`: The end user seeking access to the service provided by the service provider.

# `SAML Workflow`

The SAML authentication process consists of the following steps:

- The user requests access to a protected resource from the service provider.
- If the user is not already authenticated, the service provider generates and sends a SAML authentication request to the identity provider.
- The identity provider authenticates the user (using, e.g., a username and password, multi-factor authentication, or another method).
- The identity provider constructs a SAML response, which includes details about the user and asserts whether the user is authorized to access the requested resource.
- The SAML response is sent back to the service provider, typically via the user’s web browser or API client.
- The service provider processes the SAML response, extracts the necessary information, and grants or denies access to the user based on the identity provider’s assertion.

With SAML, you can streamline user authentication and authorization across various applications and systems, providing a better user experience and improving your overall backend security.

[TOP](#security-assertion-markup-language-saml)