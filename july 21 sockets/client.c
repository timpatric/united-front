#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <malloc.h>

#include "headers.h"

//search receiver function
void receiver(int clientSocket,char buffer[],char agentDistrict[]){
	send(clientSocket,agentDistrict,512,0);
	send(clientSocket, buffer,512, 0);
	bzero(buffer,512);
	char filex[512];
	int ch = 0;
	//receive search data from the server
	recv(clientSocket, filex, 512,0);				
	int words = atoi(filex); //string to int conversion
	
	while(ch != words){
		recv(clientSocket, buffer, 512, 0);
		printf("%s\n",buffer);
		ch++;
	}
}

void strTrim(char str[])     // removing any leading or preceding whitespaces
{
        int i = 0, j = 0;
        char buf[512];
        strcpy(buf, str);
        for(;str[i] == ' ';i++);

        for(;str[i] != '\0';i++,j++)
                buf[j] = str[i];
        buf[j] = '\0';
        strcpy(str, buf);
}

void signature(){
	char *str;
	int total=0;
	char *key[2][26] = {"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", \
	"L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", \
	"010101101111101", "110101110101110", "001010100010001", "110101101101110", \
	"111100111100111", "111101111100100", "001010100011010", "101101111101101", \
	"111010010010111", "111010010010110", "101110100110101", "100100100100111", \
	"101111101101101", "010101101101101", "010101101101010", "110101110100100", \
	"010101101111011", "110101110101101", "111100111001111", "111010010010010", \
	"101101101101111", "101101101101010", "101101101111101", "101101010101101", \
	"101101111001111", "111001010100111"};
	char *signature[5][3];
	int num;

    for(int i=0;i<5;i++){
        for(int j=0;j<3;){
            printf("cell(%d, * %d)-",i,j);
			signature[i][j] = (char *)malloc(2);
            scanf("%d",&num);
			sprintf(signature[i][j],"%d",num);
			
			if(num==0 || num ==1){
				j++;
				total += sizeof(signature[i][j]);
                continue;

			}else if(num!=0 || num!=1){
				printf("<<!!invalid input!!>>\n");
                continue;
			}
			
        }
    }

    for(int i=0;i<5;i++){
        for(int j=0;j<3;j++){
            if(strcmp(signature[i][j],"0")==0){
                printf("  ");
            }
            else{
                printf("* ");
        }   
    }
    printf("\n");

}

str = (char *)malloc(total + 1);
for (int i = 0; i < 5; i++){
	for (int j = 0; j < 3; j++)
	{
		if (j == 0 && i == 0)
		{
			strcpy(str, signature[i][j]);
		}else{
            strcat(str, signature[i][j]);
        }
    }
}

printf("%s\n",str);
for (int i = 0; i < 5; i++){
	for (int j = 0; j < 3; j++){
		free(signature[i][j]);
	}
}

int found = 0;
char password[2];

for (int n = 0; n < 26; n++){
	if (strcmp(key[1][n], str) == 0){
        strcpy(password, key[0][n]);
        found = 1;
        break;
    }
}

if (found = 0){
	printf("Wrong password was entered\n");
}

printf("Your password is: %s \n", password);
free(str);
}

int main(){ 
	int clientSocket, ret;
	struct sockaddr_in serverAddr;

	clientSocket = socket(AF_INET, SOCK_STREAM, 0);
	if(clientSocket < 0){
		printf("Connection error.\n");
		exit(1);
	}

	memset(&serverAddr, '\0', sizeof(serverAddr));
	serverAddr.sin_family = AF_INET;
	serverAddr.sin_port = htons(PORT);
	serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");

	ret = connect(clientSocket, (struct sockaddr*)&serverAddr, sizeof(serverAddr));
	if(ret < 0){
		printf("Connection error.\n");
		exit(1);
	}

	printf("\n\nWelcome!!!!!!!!!\n");
 
	printf("\n**** UFT MEMBER DETAIL SUBMISSION PROGRAM ****\n");  

    char agentDistrict[512];
	char agentUsername[512];
    printf("\nAs an agent, enter your District:");
	scanf("%s",agentDistrict);    // getting district of current agent entering a new member
	printf("\nEnter your agent username:");
    scanf("%s",agentUsername);      // getting username of agent entering the details

	while(1){
		char buffer[512];

		bzero(buffer,sizeof(buffer));
		printf("\n*********Available commands:*********\n");
		printf("To submit the new member list\n");
		printf("\t( Addmember member_name, date, gender, recommender )\n");
		printf("To check status of the file\n");
		printf("\t( Check_status )\n");
		printf("To check statement of payments for the logged in user\n");
		printf("\t( get_statement )\n");
		printf("To submit new members from the file\n");
		printf("\t( Addmember filename.txt )\n");
		printf("To search and view a record from file by date or name\n");
		printf("\t( Search criteria )\n");

		printf("\nPlease enter desired command:");
		scanf("%s", &buffer[0]);

		if(strcmp(buffer, "finished") == 0 || strcmp(buffer, "Finished") == 0 || strcmp(buffer, "FINISHED") == 0){
			printf("You MUST add a signature before leaving\n");
			signature();//calling the signature module
			send(clientSocket, buffer, strlen(buffer), 0);
			close(clientSocket);
			printf("[-]Disconnected from server.\n");
			exit(1);
		}
		else if(strcmp(buffer, "Addmember") == 0){
			send(clientSocket,buffer,512,0);
			send(clientSocket,agentDistrict,sizeof(agentDistrict),0);
			scanf("%[^\n]s",buffer);
			char *file = buffer;
			strTrim(file); //trimming the leading and preceding whitespaces

			FILE *fp;
			int words = 0;
			fp =fopen(file, "r");     // opening a file for reading

			if(fp == NULL){
				send(clientSocket,buffer,512,0);
				recv(clientSocket,buffer,512,0);
				printf("%s\n",buffer);
			}else{  
				bzero(buffer,sizeof(buffer));
				file = "file";
				send(clientSocket,file,sizeof(file),0);
				
				while(fgets(buffer,512,fp)!=NULL){
					words++;
				}
				printf("%d\n",words);
				
				char size[512];
				sprintf(size,"%d",words);//int to string convertion
				send(clientSocket, size, sizeof(size),0);
				rewind(fp);

				char ch;
				while( fgets(buffer, 512, fp) != NULL ){
					send(clientSocket,buffer,512,0);
				}
				fclose(fp);
				printf("Member list submitted successfully\n");
			}
		}	
		
		else if(strcmp(buffer, "search") == 0){
			send(clientSocket, buffer, strlen(buffer), 0);
			scanf("%s",buffer);
			strTrim(buffer);

			//receiver module
            receiver(clientSocket,buffer,agentDistrict);
		}
		else if(strcmp(buffer, "check_status") == 0){
			send(clientSocket, buffer, sizeof(buffer), 0);
			send(clientSocket, agentDistrict, sizeof(agentDistrict), 0);
			send(clientSocket, agentUsername, sizeof(agentUsername), 0);


		}
		else if(strcmp(buffer, "get_statement") == 0){
			send(clientSocket, buffer, sizeof(buffer), 0);

			//check module
            receiver(clientSocket,agentUsername,agentDistrict);
		}
		else{
			printf("<<!!invalid command!!>>\n");
		}

 

	}
	return 0;
}