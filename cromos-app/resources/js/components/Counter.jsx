// frontend/src/components/Counter.js

import React from 'react';

const Counter = ({ totalCromos, totalUsuarioCromos }) => {
    return (
        <div className="bg-gray-800 rounded-lg shadow-lg p-6 text-white text-center">
            <h2 className="text-2xl mb-4">Estado de la Colección</h2>
            <div className="space-y-2">
                <p>Cromos totales: {totalCromos}</p>
                <p>Cromos en tu colección: {totalUsuarioCromos}/{totalCromos}</p>
            </div>
        </div>
    );
};

export default Counter;
