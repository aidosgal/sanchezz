# Sanchezz

This project is aimed at developing a backend system for managing multiple game sessions using WebSocket connections, creating game controllers, implementing a waiting room for players, adding game animations, and integrating with FreeKassa and Crypto payment gateways.

## TODO

- [ ] **Manage WebSocket connections for several game sessions**
    - Implement a WebSocket server using Go
    - Create a mechanism to handle multiple game sessions concurrently
    - Ensure efficient message broadcasting to clients within a session

- [ ] **Create GameController**
    - Develop a controller to handle game logic
    - Implement methods to start, stop, and manage game states
    - Ensure synchronization between server and clients

- [ ] **Make a waiting room for players**
    - Create a waiting room where players can join before a game starts
    - Implement logic to transition players from the waiting room to an active game session
    - Handle player timeouts and disconnections

- [ ] **Add game animation**
    - Integrate animations for game events
    - Ensure smooth and synchronized animations across all clients
    - Use a suitable JavaScript animation library

- [ ] **Connect FreeKassa and Crypto payment gateways**
    - Integrate FreeKassa API for handling payments
    - Integrate Crypto payment processing
    - Implement security measures to protect payment data
    - Ensure smooth user experience during transactions

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct and the process for submitting pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
