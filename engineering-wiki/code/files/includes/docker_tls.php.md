# includes/docker_tls.php

> PHP - 391 lines

## Functions

| Function | Line | What it does |
|---|--:|---|
| [dockerTlsNormaliseHost()](/code/functions/dockerTlsNormaliseHost.md) | 59 | Tidy what someone typed into a bare host name, or null if it is not one. |
| [dockerTlsNormaliseIp()](/code/functions/dockerTlsNormaliseIp.md) | 81 | A valid IPv4 or IPv6 address, or null. Empty input is allowed and gives null. |
| [dockerTlsBrowserAddress()](/code/functions/dockerTlsBrowserAddress.md) | 95 | What the browser used to reach this page: host, port and whether host is an IP. |
| [dockerTlsRequestIsHttps()](/code/functions/dockerTlsRequestIsHttps.md) | 117 |  |
| [dockerTlsFingerprintNormalise()](/code/functions/dockerTlsFingerprintNormalise.md) | 123 | Lower-case hex with no separators, so PHP's and the openssl CLI's agree. |
| [dockerTlsCertInfo()](/code/functions/dockerTlsCertInfo.md) | 130 | Read one PEM certificate's details, or null. |
| [dockerTlsState()](/code/functions/dockerTlsState.md) | 149 | Everything the screen needs to know, in one place. |
| [dockerTlsNeedsNewCa()](/code/functions/dockerTlsNeedsNewCa.md) | 214 | Would making a certificate for this name and IP need a NEW authority? |
| [dockerTlsSingleAddressMask()](/code/functions/dockerTlsSingleAddressMask.md) | 229 | The netmask that pins a name constraint to exactly one address. |
| [dockerTlsOpensslConfig()](/code/functions/dockerTlsOpensslConfig.md) | 244 | The OpenSSL config both certificates are made from. |
| [dockerTlsWriteFile()](/code/functions/dockerTlsWriteFile.md) | 276 | Write a file by renaming a temp copy over it, so a reader never sees half of one. |
| [dockerTlsGenerate()](/code/functions/dockerTlsGenerate.md) | 297 | Make the certificates. Returns ['new_ca' => bool, 'server' => info, 'ca' => info]. |
| [dockerTlsOpensslError()](/code/functions/dockerTlsOpensslError.md) | 385 | Drain OpenSSL's error queue into one line. |

## How it hangs together

**Included by:** [api/system/docker_tls.php](/code/files/api/system/docker_tls.php.md), [system/docker/index.php](/code/files/system/docker/index.php.md)

**Calls:** [storagePersistenceStatus()](/code/functions/storagePersistenceStatus.md)

