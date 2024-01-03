let socket = io('http://localhost:3000');
var floor = location.href.substring(location.href.lastIndexOf('/') + 1);

console.log(socket);

setTimeout(function () {
    if (socket.connected == false) {
        iziToast.show({
            theme: 'dark',
            icon: 'icon-error',
            title: 'Error!',
            timeout: 120000,
            message: 'Service Not Running!',
            position: 'center',
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            progressBarColor: 'rgb(0, 255, 184)',
            image: url + '/images/error.png',
            imageWidth: 70,
            layout: 2,
            iconColor: 'rgb(0, 255, 184)'
        });
    }
}, 2000);


let speaking = false;
var audioQueue = [];
const counterTimeouts = {};
socket.on('sendTokenStatToClientVital', (message) => {
    console.log(message)
    if (floor == message.floor) {
        var place = message.counter - 1;
        $('.tokenPlaceHolder').eq(place).find('h2').text("").text(message.token);

        var TokenSpeak = message.token.split('').join(' ').replace("-", "");
        audioQueue.push("Token Number " + TokenSpeak + " - Please Proceed to Vital Counter " + message.counter + "");

        if (!speaking) {
            speakNextToken();
        }

        if (counterTimeouts[message.counter]) {
            clearTimeout(counterTimeouts[message.counter]);
        }

        counterTimeouts[message.counter] = setTimeout(() => {
            $('.tokenPlaceHolder').eq(place).find('h2').text("-");
            delete counterTimeouts[message.counter];
        }, 120000);
    }
});

//"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --autoplay-policy=no-user-gesture-required
function speakNextToken() {
    if (audioQueue.length > 0 && !speaking) {
        speaking = true;

        var audio = new Audio(path);
        audio.play()
            .then(() => {

            })
            .catch((error) => {
                console.error('Failed to play audio:', error);
            });

        audio.onended = function () {
            function voiceEndCallback() {
                speaking = false;
                audioQueue.shift();
                speakNextToken();
            }

            var parameters = {
                onend: voiceEndCallback,
                rate: 0.8
            };

            speaking = true;
            responsiveVoice.speak(audioQueue[0], "US English Female", parameters);
        };
    }
}

