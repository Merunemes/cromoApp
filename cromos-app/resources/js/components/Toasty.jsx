// resources/js/components/Toasty.jsx
import React, { useEffect } from 'react';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const Toasty = () => {
    const showInactiveToast = () => {
        toast("¡Compra, compra! ¡O MORIRÉ!");
    };

    useEffect(() => {
        let timeoutId;

        const resetTimeout = () => {
            if (timeoutId) {
                clearTimeout(timeoutId);
            }

            timeoutId = setTimeout(showInactiveToast, 10000); // Mostrar toast después de 1 minuto (60000 milisegundos)
        };

        resetTimeout();

        document.addEventListener('mousemove', resetTimeout);
        document.addEventListener('keydown', resetTimeout);

        return () => {
            document.removeEventListener('mousemove', resetTimeout);
            document.removeEventListener('keydown', resetTimeout);
            clearTimeout(timeoutId);
        };
    }, []);

    return <ToastContainer
    position="top-right"
    autoClose={2000}
    hideProgressBar={false}
    newestOnTop={false}
    closeOnClick
    rtl={false}
    pauseOnFocusLoss
    draggable
    pauseOnHover
    theme="dark"
    transition: Bounce
    />
};

export default Toasty;
