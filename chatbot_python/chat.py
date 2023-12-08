import random
import json
import sys
import os
import torch

from model import NeuralNet
from nltk_utils import bag_of_words, tokenize

# Set up the device for PyTorch
device = torch.device('cuda' if torch.cuda.is_available() else 'cpu')

# Load intents
base_dir = os.path.dirname(os.path.realpath(__file__))
intents_file = os.path.join(base_dir, 'intents.json')

with open(intents_file, 'r') as json_data:
    intents = json.load(json_data)

# Load trained model data
data_file = os.path.join(base_dir, 'data.pth')
data = torch.load(data_file)

input_size = data["input_size"]
hidden_size = data["hidden_size"]
output_size = data["output_size"]
all_words = data['all_words']
tags = data['tags']
model_state = data["model_state"]

model = NeuralNet(input_size, hidden_size, output_size).to(device)
model.load_state_dict(model_state)
model.eval()

def get_response(msg):
    sentence = tokenize(msg)
    X = bag_of_words(sentence, all_words)
    X = X.reshape(1, X.shape[0])
    X = torch.from_numpy(X).to(device)

    output = model(X)
    _, predicted = torch.max(output, dim=1)

    tag = tags[predicted.item()]

    probs = torch.softmax(output, dim=1)
    prob = probs[0][predicted.item()]
    if prob.item() > 0.75:
        for intent in intents['intents']:
            if tag == intent["tag"]:
                return random.choice(intent['responses'])
    
    return "I do not understand..."

# Main execution: Check if command line arguments are provided
if __name__ == "__main__":
    if len(sys.argv) > 1:
        user_input = " ".join(sys.argv[1:])  # Combine command line arguments
        response = get_response(user_input)
        print(response)
    else:
        print("No input provided.")
