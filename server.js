const phpServer = require('php-server');
 
(async () => {
    const server = await phpServer({
        hostname: '0.0.0.0'
    });
    console.log(`PHP server running at ${server.url}`)
})();