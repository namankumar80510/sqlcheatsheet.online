import os

# log into ssh and run 

def read_env_file(file_path):
    env_vars = {}
    with open(file_path, 'r') as file:
        for line in file:
            if '=' in line:
                key, value = line.strip().split('=', 1)
                env_vars[key.strip()] = value.strip()
    return env_vars

def main():
    env_file_path = '.env'  # Specify the path to your .env file
    if os.path.exists(env_file_path):
        env_vars = read_env_file(env_file_path)
        if 'IP' in env_vars:
            IP = env_vars['IP']
            print(f"The IP is: {IP}")
            if 'USER' in env_vars:
                user = env_vars['USER']
                print(f"The user is: {user}")
            else:
                print("USER variable not found in .env file")
                exit();
            print("Connecting to the server...")
            os.system(f"ssh -i ../../AZURE/sample/naman {user}@{IP}")
        else:
            print("IP variable not found in .env file")
    else:
        print(".env file not found")

if __name__ == "__main__":
    main()
