#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <time.h>

#include "headers.h"

// function below will handle the search functonality that involves comparing a query and if or not the actual record exists
void checker(int newSocket,char filePath[],char userInput[],char agentDistrict[]){
		FILE *fptr;
		char pitem[512];
		int words = 0;
		fptr = fopen(filePath,"r");

		// handling the get_statement command
		if(fptr == NULL){
			printf("No file with specified record! \n");
			exit(EXIT_FAILURE);
		}

		//get the number of occurances of the item
		while(fgets(pitem,512,fptr)!=NULL){
			int contentFound = strlen(pitem);

			pitem[contentFound - 1] = pitem[contentFound - 1] == '\n' ? '\0' : pitem[contentFound - 1];

			if(strstr(pitem,userInput)!=NULL){
				words++;
			}
		}

		char size[512];
		sprintf(size,"%d",words);//int to string convertion
		send(newSocket, size, sizeof(size),0);
		rewind(fptr);

		while(fgets(pitem,512,fptr)!=NULL){
			int contentFound = strlen(pitem);

			pitem[contentFound - 1] = pitem[contentFound - 1] == '\n' ? '\0' : pitem[contentFound - 1];

			if(strstr(pitem,userInput)!=NULL){

				send(newSocket,pitem,sizeof(pitem),0);
			} 
		} 		
}


int splitter(char data[],char check[],char distrct[]){
	char delim[] = ",";
	char *ptr = strtok(data, delim);  
	int i = 0;
	char *ptx[10];

	while(ptr!=NULL){                                
		ptx[i] = ptr;
		i++;
		ptr = strtok(NULL,delim);
	}

	if(i > 2){
		//check if recommender exists in file

		FILE *fptr;
		char pitem[512];
		char filePath[512];
	    // sprintf(filePath,"uft_party/storage/app/member-enrollments/%s.txt",distrct);
		sprintf(filePath,"uft_party/storage/app/member-enrollments/%s.txt",distrct); 
		// sprintf(filePath,"recommenders.txt");
		
		fptr = fopen(filePath,"r");
			if(fptr ==NULL){
				printf("file not found \n");
				exit(EXIT_FAILURE);
			}
			while(fgets(pitem,512,fptr)!=NULL){
				int contentFound = strlen(pitem);

				pitem[contentFound - 1] = pitem[contentFound - 1] == '\n' ? '\0' : pitem[contentFound - 1];
				if(strstr(pitem,ptx[2])!=NULL){
					strcpy(check,"ok");
					break; 
				}
			}
	}

    //if no recommender arguement supplied
	else{
	strcpy(check,"ok");
	}

	return 0;
}


int currdate(char time_[]){
    time_t t = time(NULL);
    struct tm *tm = localtime(&t);
    strftime(time_,512,"%y-%m-%d",tm);
	return 0;
}


int addmember(char addMemberArray[],char distrct[],char datePicker[]){
	char filePath[512];
	sprintf(filePath,"uft_party/storage/app/member-enrollments/%s.txt",distrct);
	           //     /uft_party/storage/app/member-enrollments/MBALE.txt
	// sprintf(filePath,"members.txt");

	FILE *fp;
	fp =fopen(filePath,"a");

	int contentFound = strlen(addMemberArray);
    addMemberArray[contentFound - 1] = addMemberArray[contentFound - 1] == '\n' ? '\0' : addMemberArray[contentFound - 1];
    sprintf(addMemberArray,"%s,%s",addMemberArray,datePicker);
    fputs(addMemberArray,fp);
    fputs("\n",fp);
    fclose(fp);

	return 0;
}


//triming of the strings 
void ltrim(char str[])
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


int main(){

	int sockfd, ret, readx;
	struct sockaddr_in serverAddr;

	int newSocket;
	struct sockaddr_in newAddr;

	socklen_t addr_size;

	char userInput[512];
	pid_t childpid;

	sockfd = socket(AF_INET, SOCK_STREAM, 0);
	
	if(sockfd < 0){
		printf("Sorry! Unable to connect!.\n");
		exit(1);
	} 

	memset(&serverAddr, '\0', sizeof(serverAddr));
	serverAddr.sin_family = AF_INET;
	serverAddr.sin_port = htons(PORT);
	serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");

	ret = bind(sockfd, (struct sockaddr*)&serverAddr, sizeof(serverAddr));

	if(ret < 0){
		listen(sockfd, 1) == 1;
		printf("Sorry! Unable to connect!.\n");
		exit(1);
	}
	printf("Connected\n");

	if(listen(sockfd, 1) == 0){
		printf("Server is active\n");
	}else{
		listen(sockfd, 1) == 1;
		printf("Oops! Unable to connect!.\n");
	}

	while(1){	
		newSocket = accept(sockfd, (struct sockaddr*)&newAddr, &addr_size);
		if(newSocket < 0){
			exit(1);
		}
		printf("Incoming signal from %s:%d\n", inet_ntoa(newAddr.sin_addr), ntohs(newAddr.sin_port));

		if((childpid = fork()) == 0){
			close(sockfd);

			while(1){
				char userInput[512];
				char agentDistrict[512];
				char password[10];
				char user[512];

				char cdate[512];

				currdate(cdate);

				// readx below is the exact text the user enters into the command line after the predefined commands
				recv(newSocket,userInput,512,0); 

				if(strcmp(userInput, "Addmember") == 0){
					recv(newSocket,agentDistrict,512,0); 
					recv(newSocket,userInput,512,0); 

					//variables to be used
					char test[512];
					strcpy(test,userInput);
					char check[100] = "fail";

					if(strcmp(userInput,"file") ==0){
						bzero(userInput,sizeof(userInput));
						
						FILE *fp;
						int ch = 0;
						int words;
						char filePath[512]; 


						sprintf(filePath,"uft_party/storage/app/member-enrollments/%s.txt",agentDistrict);
						// sprintf(filePath, "members.txt");

						fp =fopen(filePath,"a");
						recv(newSocket, &words, sizeof(int),0);				
						// int words = atoi(words); //string to int conversion
						// printf("%d\n",words);
						
						while(ch != words){
							recv(newSocket,userInput,512,0);
							// printf("%s",userInput);
							splitter(test,check,agentDistrict);

							if(strcmp(check,"ok") == 0){
								addmember(userInput,agentDistrict,cdate);
								printf(userInput,"Members added to the party!");
								send(newSocket,userInput,sizeof(userInput),0);
							}
							
							else{
								sprintf(userInput,"Matching recommender not found. Please try again");
								send(newSocket,userInput,sizeof(userInput),0);
							}
							
							ch++;
						}
						fputs("",fp);  // printing a new line for the next member details
						fclose(fp);
					}
					else{
						//splitting and checking the recommender
						splitter(test,check,agentDistrict);

                        if(strcmp(check,"ok") == 0){
							addmember(userInput,agentDistrict,cdate);
							sprintf(userInput,"New member added to %s district Successfully!", agentDistrict);
							send(newSocket,userInput,sizeof(userInput),0);
						}
						else{
							// sprintf(userInput,"Recommender '%s %s' doesn't exist.", words, test);
							sprintf(userInput,"Recommender provided not found.\n\nMember details not saved!\n");
							send(newSocket,userInput,sizeof(userInput),0);
						}
					}	
					bzero(userInput,sizeof(userInput));
				}				

				else if(strcmp(userInput, "Search") == 0){
					recv(newSocket,agentDistrict,512,0);
					readx = recv(newSocket,userInput,512,0);
					userInput[readx] = '\0';

					char filePath[512];
					sprintf(filePath,"uft_party/storage/app/member-enrollments/%s.txt",agentDistrict); 
					// sprintf(filePath, "members.txt");
					
					   //call the search module
					checker(newSocket,filePath,userInput,agentDistrict);

				}
				else if(strcmp(userInput, "check_status") == 0){
					bzero(userInput,sizeof(userInput));
					recv(newSocket,agentDistrict, sizeof(agentDistrict),0);
					recv(newSocket, user, sizeof(user),0);
				}
				else if(strcmp(userInput, "get_statement") == 0){
					recv(newSocket,agentDistrict, sizeof(agentDistrict),0);
					recv(newSocket, user, sizeof(user),0);

					char filePath[512];
					sprintf(filePath,"uft_party/storage/app/member-enrollments/%s.txt",agentDistrict);
					// sprintf(filePath,"members.txt"); 

					//call the search module
				    checker(newSocket,filePath,user,agentDistrict);
				}

				else if(strcmp(userInput, "exit") == 0){
					printf("Disconnected from %s:%d\n", inet_ntoa(newAddr.sin_addr), ntohs(newAddr.sin_port));
				}
			}
		}
	}

	close(newSocket);

	return 0;
}
