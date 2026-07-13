[Volver al Menú](/readme.md)

# `Cosas Varias`

## `RSL(Row Level Security)`

Secure your data using Postgres Row Level Security. When you need granular authorization rules, nothing beats Postgres's Row Level Security (RLS).

At its core, RLS is a security feature built directly into PostgreSQL (the database that powers Supabase). You can think of it as a bouncer standing at the door of every single row in your database tables.

---

## `No RSL`

Without RLS, if an application connects to your database, it can see or edit everything in a table. With RLS enabled, you write SQL policies that check the user's identity before returning or modifying data.

For example, you can write an RLS policy that says: "Only allow the user to read or update this specific row if their authentication ID matches the user_id column." Supabase heavily promotes RLS because it allows frontend code (like a React client) to query the database directly and safely using a public API key. The database itself handles the security, ensuring users only see what they are allowed to see.

Ultimately, disabling RLS means your team has decided to trust the Next.js backend to serve as the absolute gatekeeper for all data.

---

## `JSON Binary`

It is a specialized data type that allows you to store entire JSON objects, arrays, or scalars directly inside a single column of your database table, while storing that data in a decompressed, binary format.

`jsonb` gives you the flexibility of a `NoSQL` database (like `MongoDB`) inside a robust, relational `SQL` database (`Postgres`). It is perfect for:

- User Preferences: Storing UI settings, themes, or custom dashboard layouts that change frequently.

- E-commerce Attributes: A laptop has a "CPU" and "RAM" attribute; a shirt has a "Size" and "Color" attribute. Instead of creating dozens of empty columns, you put them all in an attributes jsonb column.

- Third-Party API Payloads: Storing the raw webhook data sent from services like Stripe, Twilio, or GitHub.

`The Golden Rule`: You should almost always use jsonb. The only time you use regular json is if you absolutely need to preserve the exact formatting, spacing, or key ordering of the original input.
