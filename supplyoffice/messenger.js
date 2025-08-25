$(document).ready(function () {
    let currentChat = ''; // Track the currently opened chat

    // Function to show/hide the chat box
    window.toggleChat = function (recipient) {
        if (currentChat === recipient && $('#chat-box').is(':visible')) {
            $('#chat-box').hide(); // Hide the chat box if it's already open
            currentChat = '';
        } else {
            $('#chat-header-name').text(recipient);
            $('#chat-box').show(); // Show the chat box
            currentChat = recipient;
            loadMessages(recipient); // Load messages for the selected recipient

            // Mark messages as read
            markMessagesAsRead(recipient);
        }
    };

    // Function to load messages for the current chat
    function loadMessages(recipient) {
        $.ajax({
            url: 'load_messages.php',
            method: 'GET',
            data: { recipient: recipient },
            success: function (data) {
                $('#chat-messages').html(data);
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);

                // Add click event to toggle time display for each message
                $('.message-item').off('click').on('click', function () {
                    $(this).find('.message-time').toggle();
                });
            },
            error: function (xhr) {
                console.error('Error loading messages:', xhr.responseText);
            }
        });
    }

    // Load unread message counts
    function loadUnreadCounts() {
    $.ajax({
        url: 'fetch_unread_counts.php',
        method: 'GET',
        success: function (response) {
            const counts = JSON.parse(response);

            // Update unread counts for each recipient
            ['Pharmacy', 'Laboratory', 'Central Supply Room'].forEach((office) => {
                const count = counts[office] || 0;
                const element = $(`#${office.replace(/ /g, '-')}-unread-count`); // Use IDs like "Pharmacy-unread-count"

                if (count > 0) {
                    element.show().text(count);
                } else {
                    element.hide(); // Hide if there are no unread messages
                }
            });
        },
        error: function (xhr) {
            console.error('Error fetching unread counts:', xhr.responseText);
        }
    });
}


    // Mark messages as read
    function markMessagesAsRead(recipient) {
        $.ajax({
            url: 'mark_messages_read.php',
            method: 'POST',
            data: { recipient: recipient },
            success: function () {
                loadUnreadCounts(); // Refresh unread counts
            },
            error: function (xhr) {
                console.error('Error marking messages as read:', xhr.responseText);
            }
        });
    }

    // Send message on button click
    $('#send-btn').on('click', function () {
        let message = $('#message-input').val();
        let recipient = $('#chat-header-name').text();

        if (message) {
            $.ajax({
                url: 'send_message.php',
                method: 'POST',
                data: { message: message, sender: 'Supply Office', recipient: recipient },
                success: function () {
                    $('#message-input').val('');
                    loadMessages(recipient);
                    loadChatList(); // Update the chat list
                },
                error: function (xhr) {
                    console.error('Error sending message:', xhr.responseText);
                }
            });
        }
    });

    // Auto-refresh messages and chat list every 2 seconds
    setInterval(function () {
        if (currentChat) {
            loadMessages(currentChat);
        }
        loadUnreadCounts(); // Refresh the unread counts
    }, 2000);

    // Initial load
    loadUnreadCounts();
});
