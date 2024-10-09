import requests

def start_session():
    url = "http://localhost:3000/api/sessions/start"
    data = {
        "name": "default"
    }
    response = requests.post(url, json=data)
    
    if response.status_code == 201 or response.status_code == 200:
        return True
    else:
        return False

# Call the function to test
if start_session():
    print("Session started successfully!")
else:
    print("Failed to start session.")
