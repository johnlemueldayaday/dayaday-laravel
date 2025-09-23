import React, { useState } from 'react';
import ReactDOM from 'react-dom';

function Example() {
    const [firstName, setFirstName] = useState('');
    const [lastName, setLastName] = useState('');
    const [data, setData] = useState([]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await fetch('/api/save-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ firstName, lastName }),
            });

            if (response.ok) {
                setFirstName('');
                setLastName('');
                handleFetchData();
            } else {
                alert('Failed to save data.');
            }
        } catch (error) {
            console.error(error);
        }
    };

    const handleFetchData = async () => {
        try {
            const response = await fetch('/api/fetch-data');
            if (response.ok) {
                const result = await response.json();
                setData(result);
            }
        } catch (error) {
            console.error(error);
        }
    };

    const handleDelete = async (id) => {
        try {
            const response = await fetch(`/api/delete-data/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            });

            if (response.ok) {
                setData(data.filter(item => item.id !== id));
            }
        } catch (error) {
            console.error(error);
        }
    };

    const handleEdit = async (id, updatedFirstName, updatedLastName) => {
        try {
            const response = await fetch(`/api/update-data/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ firstName: updatedFirstName, lastName: updatedLastName }),
            });

            if (response.ok) {
                handleFetchData();
            }
        } catch (error) {
            console.error(error);
        }
    };

    return (
        <div className="card shadow-lg p-4 bg-dark text-light rounded-4 border-0">
            <h2 className="text-center mb-4 fw-bold text-success">✨ Data Manager ✨</h2>
            
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label htmlFor="firstName" className="form-label">First Name</label>
                    <input
                        type="text"
                        id="firstName"
                        className="form-control bg-dark text-light border-secondary"
                        value={firstName}
                        onChange={(e) => setFirstName(e.target.value)}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label htmlFor="lastName" className="form-label">Last Name</label>
                    <input
                        type="text"
                        id="lastName"
                        className="form-control bg-dark text-light border-secondary"
                        value={lastName}
                        onChange={(e) => setLastName(e.target.value)}
                        required
                    />
                </div>
                <button type="submit" className="btn btn-success w-100 fw-semibold shadow-sm">
                    ➕ Save Data
                </button>
            </form>

            <button onClick={handleFetchData} className="btn btn-outline-light w-100 mt-3 fw-semibold shadow-sm">
                📄 View Data
            </button>

            {data.length > 0 && (
                <div className="table-responsive mt-4">
                    <table className="table table-dark table-hover align-middle rounded-3 overflow-hidden shadow-sm">
                        <thead className="table-success text-dark">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {data.map((item) => (
                                <tr key={item.id}>
                                    <td>{item.id}</td>
                                    <td>{item.first_name}</td>
                                    <td>{item.last_name}</td>
                                    <td>{new Date(item.created_at).toLocaleString()}</td>
                                    <td>
                                        <button
                                            className="btn btn-warning btn-sm me-2 fw-semibold"
                                            onClick={() => {
                                                const newFirst = prompt("Enter new first name:", item.first_name);
                                                const newLast = prompt("Enter new last name:", item.last_name);
                                                if (newFirst && newLast) {
                                                    handleEdit(item.id, newFirst, newLast);
                                                }
                                            }}
                                        >
                                            ✏ Edit
                                        </button>
                                        <button
                                            className="btn btn-danger btn-sm fw-semibold"
                                            onClick={() => handleDelete(item.id)}
                                        >
                                            🗑 Delete
                                        </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            )}
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
