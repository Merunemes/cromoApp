import React, { useState, useEffect } from 'react';
import axios from 'axios';

const BuyPackButton = ({ userId, userPoints }) => {
    const [message, setMessage] = useState('');

    useEffect(() => {
        console.log('userPoints:', userPoints);
    }, [userPoints]);

    const buyPack = async () => {
        if (userPoints < 2000) {
            setMessage('No tienes suficientes puntos para comprar un sobre.');
            return;
        }

        try {
            // Realizar la petición a Laravel para comprar el sobre y obtener cromos
            const response = await axios.post(`/api/buy-pack/${userId}`);
            const { cromo1, cromo2 } = response.data;

            setMessage(`Has obtenido los cromos ${cromo1} y ${cromo2}.`);

            // Aquí podrías añadir lógica adicional para actualizar localmente la colección de cromos del usuario
        } catch (error) {
            console.error('Error al comprar el sobre:', error);
            setMessage('Ha ocurrido un error al comprar el sobre. Inténtalo de nuevo más tarde.');
        }
    };

    return (
        <div>
            <button onClick={buyPack} className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Comprar Sobre (2000 puntos)
            </button>
            <div className="mt-2 text-green-600">{message}</div>
        </div>
    );
};

export default BuyPackButton;
