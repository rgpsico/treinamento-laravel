import Vue from 'vue'
window.Echo.channel('post-created')
            .listen('PostCreated', (e) => {                
                console.log(e)
                console.log(e.post.title)
                    
                 Vue.$vToastify.success("SUcesso", 'novo post') 
            })