export const admin = {
    fetchAdminByEmail: async function(email){
        try{
            const response = await fetch(` http://127.0.0.1:8000/api/admins/${email} `, {
                method: getComputedStyle,
                headers: {
                    'Content-type': 'application/json'
                },
            });
            if (response.ok && response.status == 200) {
                console.log(response);
            }
        } catch (error) {
            console.log(error);
        }
        
    }
}

document.addEventListener("DOMContentLoaded", admin.init);