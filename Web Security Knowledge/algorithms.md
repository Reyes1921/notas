[Volver al Menú](root.md)

# `Hashing Algorithms`

# `MD5`

MD5 (Message-Digest Algorithm 5) is a hash function that is currently advised not to be used due to its extensive vulnerabilities. It is still used as a checksum to verify data integrity.

The MD5 (message-digest algorithm) hashing algorithm is a one-way cryptographic function that accepts a message of any length as input and returns as output a fixed-length digest value to be used for authenticating the original message.

The MD5 hash function was originally designed for use as a secure cryptographic hash algorithm for authenticating digital signatures. But MD5 has been deprecated for uses other than as a noncryptographic checksum to verify data integrity and detect unintentional data corruption.

# `SHA family`

SHA (Secure Hash Algorithms) is a family of cryptographic hash functions created by the NIST (National Institute of Standards and Technology). The family includes:

- ``SHA-0`: Published in 1993, this is the first algorithm in the family. Shortly after its release, it was discontinued for an undisclosed significant flaw.
- ``SHA-1`: Created to replace SHA-0 and which resembles MD5, this algorithm has been considered insecure since 2010.
- ``SHA-2`: This isn’t an algorithm, but a set of them, with SHA-256 and SHA-512 being the most popular. SHA-2 is still secure and widely used.
- ``SHA-3`: Born in a competition, this is the newest member of the family. SHA-3 is very secure and doesn’t carry the same design flaws as its brethren.

# `Scrypt`

`Scrypt` (pronounced “ess crypt”) is a password hashing function (like bcrypt). It is designed to use a lot of hardware, which makes brute-force attacks more difficult. `Scrypt` is mainly used as a proof-of-work algorithm for cryptocurrencies.

In cryptography, `scrypt` (pronounced "ess crypt") is a password-based key derivation function created by Colin Percival in March 2009, originally for the Tarsnap online backup service. The algorithm was specifically designed to make it costly to perform large-scale custom hardware attacks by requiring large amounts of memory. In 2016, the `scrypt` algorithm was published by IETF as RFC 7914. A simplified version of `scrypt` is used as a proof-of-work scheme by a number of cryptocurrencies, first implemented by an anonymous programmer called ArtForz in Tenebrix and followed by Fairbrix and Litecoin soon after.

# `Bcrypt`

`bcrypt` is a password hashing function, that has been proven reliable and secure since it’s release in 1999. It has been implemented into most commonly-used programming languages.

[TOP](#hashing-algorithms)
