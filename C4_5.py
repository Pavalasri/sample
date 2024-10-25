import math
file = open("naive_discrete.txt")
count=0
inp=[]
class_label=[]

while True:
    data=file.readline().strip()
    if not data:
        break
    if count==0:
        attr=data.split()[0:]
    if count>0:
        inp.append(data.split()[1:-1])
        class_label.append(data.split()[-1])
    count+=1
count-=1

cls_label=list(set(class_label))
#print(cls_label)

cls_count={}

for i in range(0,len(cls_label)):
    cls_count[cls_label[i]]=class_label.count(cls_label[i])    

#print(cls_count)

prob_Ci={}
for i in range(0,len(cls_count)):
    prob_Ci[cls_label[i]]=round(cls_count[cls_label[i]]/count,4)

#print(prob_Ci)

info_D=0

for i in range(0,len(cls_label)):
    info_D = info_D - (prob_Ci[cls_label[i]] * math.log2(prob_Ci[cls_label[i]]))
    info_D = round(info_D,3)
#print(info_D)

attributes=len(inp[0])

def calculate_entropy(attribute_index):
    attribute_values = {} #{}
   
    for i in range(count):
        attribute_value = inp[i][attribute_index] #inp[0][0] = youth
        class_value = class_label[i]#no

        if attribute_value not in attribute_values:
            attribute_values[attribute_value] = {j: 0 for j in cls_label}
        
        attribute_values[attribute_value][class_value] += 1
    print(attribute_values)
    entropy_A = 0
    split=0
    lis=[]
    for value in attribute_values:
        total_value_count = sum(attribute_values[value].values())
        print(total_value_count)
        value_entropy = 0

        for k in cls_label:
            if attribute_values[value][k] > 0:
                prob = attribute_values[value][k] / total_value_count
                value_entropy -= prob * math.log2(prob)
       
        entropy_A += (total_value_count / count) * value_entropy
        split+= - (total_value_count/count) * math.log2(total_value_count/count)
        
    lis.append(entropy_A) 
    lis.append(split)
    return lis

max=0
for i in range(attributes):
    entropy_A = calculate_entropy(i) #info_A
    info= round(entropy_A[0],3)
    split_info=round(entropy_A[1],3)
    gain_A = round(info_D - entropy_A[0],3)
    gain_ratio = round(gain_A/split_info,3)
    
    print("\n")
    print(f"Entropy for {attr[i]}: {info}")
    print(f"Information Gain for {attr[i]}: {gain_A}")
    print(f"Split info for {attr[i]}: {split_info}")
    print(f"Gain ratio for {attr[i]}: {gain_ratio}")
    if max < gain_ratio:
        max=gain_ratio
        value=attr[i]
print("\nBest attribute is selected as ",value)
        
