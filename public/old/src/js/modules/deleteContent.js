

const deleteContent = () => {
  const axios = require('axios');
  const loader = document.createElement('div');
  loader.classList.add('lds-ripple');
  loader.innerHTML = '<div></div><div></div></div>';
  const overlay = document.createElement('div');
  overlay.classList.add('overlay');
  overlay.append(loader);


    const deleteHandler = (selector, url) => {
        try {
          document.querySelectorAll(selector).forEach(item => {
           item.addEventListener('click', (event) => {
            event.preventDefault();  
            const selectorId = event.target.getAttribute('id');
             
              console.log(event.target.parentNode.parentNode.parentNode)
              axios.delete(url, {
                data: {
                  id: selectorId,
                }
              }) 
  
                .then(function (response) {
                   document.body.append(overlay);

                   event.target.parentNode.parentNode.parentNode.remove();
                   console.log(event.target.parentElement)
                 
                   console.log(response)
                  setTimeout(() => {
                    overlay.remove();
                    location.reload();
                  }, 1000)
                  return response;
                 
                })
                .catch(function (error) {
                  console.log(error);
                });
          });
          });
          
        } catch(e) {}

      
    } 


    deleteHandler('.delete_post', 'delete_post.php');
    
}

export default deleteContent;