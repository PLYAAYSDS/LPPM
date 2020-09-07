#include<stdio.h>

int main(){
	int[] a = {1,2,3,4,5,6};
	
	int i = a.length - 1;
	
	while(i>=0){
		printf("%d", a[i]);
		i--;
	}
	
	
	return 0;
}
