import React, { useState, useEffect } from 'react';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const RandomPointsButton = ({ userId }) => {
    const [lastClicked, setLastClicked] = useState(localStorage.getItem('lastClicked') || null);
    const [pointsEarned, setPointsEarned] = useState(0);
    const [canClick, setCanClick] = useState(true);

    useEffect(() => {
        if (lastClicked) {
            const elapsedTime = new Date().getTime() - lastClicked;
            if (elapsedTime < 21600000) {
                setCanClick(false);
                setTimeout(() => {
                    setCanClick(true);
                }, 21600000 - elapsedTime);
            }
        }
    }, [lastClicked]);

    const handleClick = async () => {
        if (canClick) {
            const newPoints = Math.floor(Math.random() * 1001); // Puntos aleatorios entre 0 y 1000
            setPointsEarned(newPoints);
            setCanClick(false);
            const now = new Date().getTime();
            setLastClicked(now);
            localStorage.setItem('lastClicked', now);

            // Mostrar toast con el mensaje de puntos ganados
            toast.success(`¡Has ganado ${newPoints} puntos!`, {
                position: "top-right",
                autoClose: 3000,
                hideProgressBar: false,
                closeOnClick: true,
                pauseOnHover: true,
                draggable: true,
                progress: undefined,
            });

            // Enviar los puntos al servidor para actualizarlos en el usuario
            try {
                const response = await fetch('/api/update-points', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ userId, points: newPoints }),
                });

                const responseText = await response.text(); // Obtener el texto de la respuesta completa
                console.log('Respuesta completa del servidor:', responseText);

                if (response.ok) {
                    const data = JSON.parse(responseText); // Analizar el texto de la respuesta como JSON
                    if (data.success) {
                        console.log('Puntos actualizados correctamente');
                    } else {
                        console.error('Error al actualizar los puntos');
                    }
                } else {
                    console.error('Error en la respuesta del servidor:', responseText);
                }
            } catch (error) {
                console.error('Error al actualizar los puntos:', error);
            }

            setTimeout(() => {
                setCanClick(true);
            }, 21600000); // 6 horas en milisegundos
        }
    };

    return (
        <div className="random-points-button">
            <button
                className={`points-button ${canClick ? '' : 'disabled'}`}
                onClick={handleClick}
            >
                {canClick ? '¡Haz clic para ganar puntos!' : '¡Espera 6 horas para volver a hacer clic!'}
            </button>
            {pointsEarned > 0 && (
                <div className="points-earned">
                    Ganaste <strong>{pointsEarned}</strong> puntos.
                </div>
            )}
            <ToastContainer />
        </div>
    );
};

export default RandomPointsButton;
