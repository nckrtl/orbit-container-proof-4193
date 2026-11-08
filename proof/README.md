# Orbit container lifecycle fixture

This is the Laravel 13 skeleton at `def7ce14811161f3c689a71ca8abc1369da44bd6`, with its original MIT license. It contains no user data or credentials.

The proof uses PostgreSQL database sessions, synchronous jobs, log mail and broadcasting, and local disposable files. It has no external integrations. The first Orbit setup step runs `php proof/verify-isolation.php` before dependency installation. Do not cache configuration: each cloned Instance receives a new environment and credentials.

The lifecycle proof creates a default Instance and a feature, checks database and filesystem separation, edits and commits through Conn, delivers the commit through Git, and removes only the feature.
