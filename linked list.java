class Node {
    int data;
    Node next;


    Node(int data) {
        this.data = data;
        this.next = null;
    }
}


class LinkedList {
    Node head;


    public void append(int data) {
        Node newNode = new Node(data);

        if (head == null) {
            head = newNode;
        } else {
            Node current = head;
            while (current.next != null) {
                current = current.next;
            }
            current.next = newNode;
        }
    }


    public void printList() {
        Node current = head;
        while (current != null) {
            System.out.print(current.data + " ");
            current = current.next;
        }
        System.out.println();
    }


    public static LinkedList mergeLists(LinkedList list1, LinkedList list2) {
        LinkedList mergedList = new LinkedList();

        Node current1 = list1.head;
        while (current1 != null) {
            mergedList.append(current1.data);
            current1 = current1.next;
        }

        Node current2 = list2.head;
        while (current2 != null) {
            mergedList.append(current2.data);
            current2 = current2.next;
        }

        return mergedList;
    }
}


public class Main {
    public static void main(String[] args) {
        // Create two linked lists
        LinkedList list1 = new LinkedList();
        list1.append(1);
        list1.append(2);
        list1.append(3);

        LinkedList list2 = new LinkedList();
        list2.append(4);
        list2.append(5);
        list2.append(6);


        System.out.println("List 1:");
        list1.printList();

        System.out.println("List 2:");
        list2.printList();


        LinkedList mergedList = LinkedList.mergeLists(list1, list2);


        System.out.println("Merged List:");
        mergedList.printList();
    }
}