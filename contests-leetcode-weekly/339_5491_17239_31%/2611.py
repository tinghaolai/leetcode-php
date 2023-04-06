class Solution(object):
    def miceAndCheese(self, reward1, reward2, k):
        diff = []
        for index, reward in enumerate(reward1):
            diff.append({
                'index': index,
                'diff': reward - reward2[index],
                'r1': reward,
                'r2': reward2[index],
            })

        diff.sort(key=lambda x: x['diff'], reverse=True)

        result = 0
        for index, item in enumerate(diff):
            if index < k:
                result += item['r1']
            else:
                result += item['r2']

        return result