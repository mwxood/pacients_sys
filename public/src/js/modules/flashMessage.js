const flashMessage = () => {
    const message = document.querySelector('.message-holder');

    try {
        setTimeout(function() {
            if(message !== null) {
                message.remove();
            }
        }, 1500)
    } catch(e) {}
}

export default flashMessage;