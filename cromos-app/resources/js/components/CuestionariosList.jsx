// resources/js/components/CuestionariosList.jsx

import React from 'react';

const CuestionariosList = ({ cuestionarios }) => {
    return (
        <div className="mt-4">
            <h3 className="font-semibold text-lg text-center text-orange-500 dark:text-orange-400">Cuestionarios Disponibles</h3>
            <ul>
                {cuestionarios.map(cuestionario => (
                    <div key={cuestionario.id} className="p-4 bg-white dark:bg-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <a
                            href={`cuestionarios/${cuestionario.id}`}
                            className="block text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-600"
                            style={{ fontSize: '1.1rem' }}
                        >
                            {cuestionario.title}
                        </a>
                    </div>
                ))}
            </ul>
        </div>
    );
};

export default CuestionariosList;
