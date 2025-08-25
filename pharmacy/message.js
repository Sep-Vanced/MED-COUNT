$(document).ready(function () {
    const sender = 'Pharmacy'; // Adjust sender as needed
    const recipient = 'Supply Office'; // Adjust recipient as needed

    // Function to fetch messages
    function fetchMessages() {
        $.ajax({
            url: 'fetch_messages.php',
            type: 'GET',
            data: { recipient: recipient },
            success: function (response) {
                try {
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        $('#chat-messages').empty(); // Clear existing messages
                        let previousDate = '';

                        data.messages.forEach(message => {
                            // Display date only if it's different from the previous one
                            if (message.date !== previousDate) {
                                $('#chat-messages').append(`<div class='message-date'>${message.date}</div>`);
                                previousDate = message.date;
                            }

                            // Determine message class based on sender
                            const messageClass = message.sender === sender ? 'sent-message' : 'received-message';

                            // Create message HTML
                            const messageHtml = `
                                <div class='${messageClass}'>
                                    ${message.content}
                                    <span class='message-time'>${message.time}</span>
                                </div>`;
                            $('#chat-messages').append(messageHtml);
                        });

                        // Scroll to the bottom of the chat
                        $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);

                        // Add click event to toggle time display
                        $('.sent-message, .received-message').off('click').on('click', function () {
                            $(this).find('.message-time').toggle(); // Toggle time display
                        });
                    } else {
                        console.error('Error fetching messages:', data.message);
                    }
                } catch (error) {
                    console.error('Error parsing JSON response:', error);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error loading messages:', xhr.responseText);
            }
        });
    }

    // Call fetchMessages every 2 seconds
    setInterval(fetchMessages, 2000);

    // Handle sending messages
    $('#send-btn').on('click', function () {
        const message = $('#message-input').val();

        if (message.trim() === '') return; // Prevent sending empty messages

        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: { sender: sender, message: message, recipient: recipient },
            success: function (response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    $('#message-input').val(''); // Clear the input
                    fetchMessages(); // Refresh messages
                } else {
                    alert('Failed to send message: ' + result.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error sending message:', xhr.responseText);
            }
        });
    });
});
