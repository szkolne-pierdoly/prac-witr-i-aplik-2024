document.addEventListener('DOMContentLoaded', function () {
    const sendButton = document.querySelector('.sent-row button');
    const messageInput = document.querySelector('.sent-row input[type="text"]');
    const chatWindow = document.querySelector('.chat');
    const randomAnswerButton = document.querySelector('.randomasn');

    sendButton.addEventListener('click', function () {
        const messageText = messageInput.value;
        if (messageText.trim() !== '') {
            const messageDiv = createJolantaMessage(messageText);
            chatWindow.appendChild(messageDiv);
            messageInput.value = ''; // Wyczyść pole input po wysłaniu wiadomości
            chatWindow.scrollTop = chatWindow.scrollHeight; // Przewiń chat do dołu
        }
    });

    const krzysztofAnswers = [
        "Świetnie!",
        "Kto gra główną rolę?",
        "Lubisz filmy Tego reżysera?",
        "Będę 10 minut wcześniej",
        "Może kupimy sobie popcorn?",
        "Ja wolę Colę",
        "Zaproszę jeszcze Grześka",
        "Tydzień temu też byłem w kinie na Diunie",
        "Ja funduję bilety"
    ];

    randomAnswerButton.addEventListener('click', function() {
        const randomIndex = Math.floor(Math.random() * krzysztofAnswers.length);
        const randomAnswer = krzysztofAnswers[randomIndex];
        const messageDiv = createKrzysztofMessage(randomAnswer);
        chatWindow.appendChild(messageDiv);
        chatWindow.scrollTop = chatWindow.scrollHeight;
    });

    function createJolantaMessage(text) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message1');

        const imageElement = document.createElement('img');
        imageElement.src = './Jolka.png';
        imageElement.alt = 'Jolanta Nowak';

        const messageParagraph = document.createElement('p');
        messageParagraph.textContent = text;

        messageDiv.appendChild(imageElement);
        messageDiv.appendChild(messageParagraph);
        return messageDiv;
    }

    function createKrzysztofMessage(text) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message2');

        const imageElement = document.createElement('img');
        imageElement.src = './Krzysiek.jpg';
        imageElement.alt = 'Krzysztof Łukasnski';

        const messageParagraph = document.createElement('p');
        messageParagraph.textContent = text;

        messageDiv.appendChild(messageParagraph);
        messageDiv.appendChild(imageElement);
        return messageDiv;
    }
}); 