<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Chat with Bot</title>
    <style>
        #chat-container {
            position: fixed;
            bottom: 70px;
            right: 20px;
            width: 450px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: white;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            transition: opacity 0.5s, visibility 0.5s;
            border-radius: 20px;

        }

        #chatbox {
            height: 400px;
            overflow-y: auto;
            padding: 5px;
            background: #f9f9f9;
            margin-bottom: 10px;
        }

        #user_input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-right: 20px;
        }

        #send-button {
            padding: 10px 10px;
            background-color: black;
            border: none;
            border-radius: 3px;
            color: white;
            cursor: pointer;
        }

        .chat-message {
            padding: 5px;
            margin: 5px 0;
        }

        .user-message {
            text-align: left;
            background-color: #D9D9D9;
            color: black;
            border-radius: 5px;
        }

        .bot-message {
            text-align: left;
            background-color: #eee;
            border-radius: 5px;
        }



        #close-chat-button {
            position: absolute;
            right: 10px;
            top: 6px;
            border: none;
            background-color: transparent;
            color: black;
            cursor: pointer;
            font-size: 16px;
        }

        #open-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Chatbox styling */
        #chatbox {
            height: 400px;
            overflow-y: auto;
            padding: 10px;
            background: #f9f9f9;
            margin-bottom: 10px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }



      
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }


        .chat-message {
            margin: 5px 0;
            padding: 10px;
            border-radius: 18px;
            max-width: 80%;
            word-wrap: break-word;
        }


        .user-message {
            background-color: black;
            color: white;
            border-bottom-right-radius: 0;
     
            margin-left: 20%;
     
            text-align: left;
        }


        .bot-message {
            background-color: #ECEAEA;
            color: black;
            border-bottom-left-radius: 0;
   
            text-align: left;
        }

        #chat-header {
            background-color: #000;
            color: #fff;
            padding: 15px;
            display: flex;
            text-align: left;
            justify-content: space-between;

        }
        #header-title{
            text-align: left;
            margin-right: 200px;
            font-family:sans-serif;
        }
  
#input-container {
    display: flex;
    padding: 10px;
    background-color: #f1f1f1; 
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

#user_input {
    flex: 1; 
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 20px 0 0 20px; 
    margin: 0;
    border-right: none; 
    font-size: 16px; 
}

#send-button {
    padding: 10px 20px;
    background-color: black;
    border: none;
    border-radius: 0 20px 20px 0; 
    margin: 0;
    font-size: 16px; 
    transition: background-color 0.3s ease; 
}



.chat-message {
    padding: 10px;
    border-radius: 20px;
    margin-bottom: 8px;
    max-width: 80%;
    word-wrap: break-word;
}


.user-message {
    background-color: #000;
    color: white;
    float: right; 
    clear: both; 
    border-bottom-right-radius: 0;
    margin-right: 10px;
}


.bot-message {
    background-color: #f1f1f1;
    color: black;
    float: left;
    clear: both; 
    border-bottom-left-radius: 0;
    margin-left: 10px;
}


.clearfix::after {
    content: "";
    clear: both;
    display: table;
}



    </style>
</head>

<body>
    <button id="open-chat-button" onclick="toggleChat()">
        <i class="bi bi-chat-dots"></i> Chat with a Fitness Specialist
    </button>


    <div id="chat-container">
        <div id="chat-header">
            <img src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png" alt="Logo" style="height: 30px; max-width: 100px;"> <!-- Adjust the src attribute to the path of your logo -->
            <span id="header-title">Customer Support</span>
            <button id="close-chat-button" onclick="closeChat()" style="background: none; border: none;">
                <i class="bi bi-x-square" style="color: white; font-size: 1.5rem;"></i> 
            </button>
        </div>


        <div id="chatbox" class="clearfix">
    <!-- Bot and user messages here -->
</div>

        <div id="input-container">
    <input type="text" id="user_input" placeholder="Type here">
    <button type="submit" id="send-button" onclick="sendMessage()">Send</button>
</div>

    </div>

    <script>
        document.getElementById('user_input').addEventListener('keyup', function(event) {
            event.preventDefault();
            if (event.keyCode === 13) { // 13 is the key code for Enter key
                sendMessage();
            }
        });

        function sendMessage() {
            console.log('sendMessage called'); // Debugging line
            var userMessage = document.getElementById('user_input').value.trim();

            // Check if the message is empty
            if (userMessage === '') {
                console.log('No message to send'); // Debugging line
                return; // Don't send empty messages
            }

            // Append user message to chatbox
            var userMessageDiv = document.createElement("div");
            userMessageDiv.classList.add("chat-message", "user-message");
            userMessageDiv.textContent = "You: " + userMessage;
            var chatbox = document.getElementById('chatbox');
            chatbox.appendChild(userMessageDiv);

            // AJAX request to the PHP AJAX Handler
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    console.log('AJAX response received'); // Debugging line
                    // Append bot response to chatbox
                    var botMessageDiv = document.createElement("div");
                    botMessageDiv.classList.add("chat-message", "bot-message");
                    botMessageDiv.textContent = "Bot: " + this.responseText;
                    chatbox.appendChild(botMessageDiv);

                    // Scroll to the bottom of the chatbox
                    chatbox.scrollTop = chatbox.scrollHeight;
                }
            };
            xhttp.open("POST", "ajax_handler.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("message=" + encodeURIComponent(userMessage));

            // Clear the input after sending
            document.getElementById('user_input').value = '';
        }


        function toggleChat() {
            var chatContainer = document.getElementById('chat-container');
            chatContainer.style.opacity = '1';
            chatContainer.style.visibility = 'visible';
            document.getElementById('open-chat-button').style.display = 'none';

            // Call the function to send a default bot message when chat opens
            sendDefaultBotMessage();
        }

        function sendDefaultBotMessage() {
            var chatbox = document.getElementById('chatbox');

            // Check if the default message is already there to avoid duplicates
            if (!chatbox.querySelector('.default-bot-message')) {
                var botMessageDiv = document.createElement("div");
                botMessageDiv.classList.add("chat-message", "bot-message", "default-bot-message");
                botMessageDiv.textContent = "Bot: Hello, I am Mariam your personal virtual assistant! How can I assist you today?";
                chatbox.appendChild(botMessageDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
            }
        }

        // Place this inside your existing script tag in the HTML document.


        function closeChat() {
            var chatContainer = document.getElementById('chat-container');
            chatContainer.style.opacity = '0';
            setTimeout(() => {
                chatContainer.style.visibility = 'hidden';
            }, 500); // Match this with your CSS transition duration
            document.getElementById('open-chat-button').style.display = 'block';
        }

        document.getElementById('user_input').addEventListener('keyup', function(event) {
            if (event.keyCode === 13) {
                sendMessage();
            }
        });



    </script>
</body>

</html>